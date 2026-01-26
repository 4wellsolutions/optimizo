import os
import json
import csv

# Directory containing English tool translations
LANG_DIR = r'd:\workspace\optimizo\resources\lang\en\tools'
UPDATE_FILE = r'd:\workspace\optimizo\meta_update_data.csv'

def get_keys(obj, keys):
    for key in keys:
        if isinstance(obj, dict) and key in obj:
            obj = obj[key]
        else:
            return None
    return obj

def get_tool_name(tool_data):
    # Same logic as report generation to identify tool
    h1 = get_keys(tool_data, ['meta', 'h1'])
    if not h1:
        h1 = get_keys(tool_data, ['content', 'hero_title'])
    if not h1:
        h1 = get_keys(tool_data, ['content', 'main_title'])
    return h1

def normalize_text(text):
    if not text:
        return ""
    return str(text).lower().strip().replace('  ', ' ')

def main():
    if not os.path.exists(UPDATE_FILE):
        print(f"Error: Update file not found at {UPDATE_FILE}")
        return

    # Load updates
    updates_by_file = {}
    with open(UPDATE_FILE, 'r', encoding='utf-8') as f:
        reader = csv.DictReader(f)
        for row in reader:
            filename = row['File Source']
            if filename not in updates_by_file:
                updates_by_file[filename] = []
            updates_by_file[filename].append(row)

    updated_count = 0
    failed_matches = []

    # Process each file
    for filename, updates in updates_by_file.items():
        filepath = os.path.join(LANG_DIR, filename)
        
        if not os.path.exists(filepath):
            print(f"Warning: File {filename} not found.")
            continue

        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                data = json.load(f)
            
            file_modified = False
            
            # For each update row, try to find the tool
            for update_row in updates:
                target_name_raw = update_row['Tool Name']
                target_name = normalize_text(target_name_raw)
                
                new_seo_title = update_row['SEO Optimized Title']
                new_tool_title = update_row['Tool Title']
                
                tool_found = False
                
                # First pass: Exact normalized match
                for tool_slug, tool_data in data.items():
                    if not isinstance(tool_data, dict):
                        continue
                    current_name = normalize_text(get_tool_name(tool_data))
                    
                    if current_name == target_name:
                        if 'meta' not in tool_data: tool_data['meta'] = {}
                        tool_data['meta']['title'] = new_seo_title
                        tool_data['meta']['h1'] = new_tool_title
                        file_modified = True
                        tool_found = True
                        updated_count += 1
                        break
                
                # Second pass: Fuzzy match (contains)
                if not tool_found:
                    for tool_slug, tool_data in data.items():
                        if not isinstance(tool_data, dict): continue
                        current_name = normalize_text(get_tool_name(tool_data))
                        
                        # Check if target is in current OR current is in target
                        # e.g. "Text to Speech" in "Text to Speech Converter"
                        if target_name in current_name or current_name in target_name:
                            if 'meta' not in tool_data: tool_data['meta'] = {}
                            tool_data['meta']['title'] = new_seo_title
                            tool_data['meta']['h1'] = new_tool_title
                            file_modified = True
                            tool_found = True
                            updated_count += 1
                            # print(f"Fuzzy updated {tool_slug}: '{current_name}' ~= '{target_name}'")
                            break

                if not tool_found:
                    failed_matches.append(f"{filename}: '{target_name_raw}'")
                    # print(f"Warning: Could not find tool '{target_name_raw}' in {filename}")

            if file_modified:
                with open(filepath, 'w', encoding='utf-8') as f:
                    json.dump(data, f, indent=4, ensure_ascii=False)
                # print(f"Saved updates to {filename}")

        except Exception as e:
            print(f"Error processing {filename}: {e}")

    print(f"Total tools updated: {updated_count}")
    if failed_matches:
        print(f"Failed to match {len(failed_matches)} tools:")
        for m in failed_matches:
            print(f" - {m}")

if __name__ == '__main__':
    main()
