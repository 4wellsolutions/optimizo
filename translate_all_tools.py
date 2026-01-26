import os
import json
import glob
import time
from concurrent.futures import ThreadPoolExecutor, as_completed
from deep_translator import GoogleTranslator

# Base directory for languages
LANG_BASE_DIR = r'd:\workspace\optimizo\resources\lang'
ENGLISH_DIR = os.path.join(LANG_BASE_DIR, 'en', 'tools')

# Language code mapping for deep_translator (if needed)
LANG_MAP = {
    'zh': 'zh-CN',  # Map 'zh' directory to 'zh-CN' translator code
    'pt': 'pt',     # Deep translator usually accepts 'pt'
}

def get_translator_code(dir_name):
    return LANG_MAP.get(dir_name, dir_name)

def process_language(lang_dir):
    try:
        target_code = get_translator_code(lang_dir)
        # print(f"Started {lang_dir} ({target_code})...")
        
        translator = GoogleTranslator(source='en', target=target_code)
        lang_tools_dir = os.path.join(LANG_BASE_DIR, lang_dir, 'tools')
        
        if not os.path.exists(lang_tools_dir):
            return f"{lang_dir}: Skipped (no tools dir)"

        # Load English source once (passed around or loaded here)
        # To avoid passing huge dicts, let's just reload keys or use global if read-only
        # For thread safety, local read is fine or global read-only.
        # Let's rely on the file system iteration to minimize memory for now, 
        # or better: pre-load English keys and values as lists.
        
        files_updated = 0
        
        # Iterate over English files to know what to look for
        en_files = glob.glob(os.path.join(ENGLISH_DIR, '*.json'))
        
        for fpath in en_files:
            filename = os.path.basename(fpath)
            target_file_path = os.path.join(lang_tools_dir, filename)
            
            if not os.path.exists(target_file_path):
                continue

            with open(fpath, 'r', encoding='utf-8') as f:
                en_data = json.load(f)

            with open(target_file_path, 'r', encoding='utf-8') as f:
                target_data = json.load(f)
            
            # Collect texts to translate
            keys_map = [] # List of (tool_slug, type 'title'|'h1', original_text)
            texts_to_translate = []
            
            file_needs_update = False
            
            for tool_slug, en_tool_data in en_data.items():
                if tool_slug not in target_data: continue
                
                en_title = en_tool_data.get('meta', {}).get('title')
                en_h1 = en_tool_data.get('meta', {}).get('h1')
                
                if en_title:
                    keys_map.append({'slug': tool_slug, 'field': 'title', 'text': en_title})
                    texts_to_translate.append(en_title)
                if en_h1:
                    keys_map.append({'slug': tool_slug, 'field': 'h1', 'text': en_h1})
                    texts_to_translate.append(en_h1)

            if not texts_to_translate:
                continue

            # Batch translate
            try:
                # Chunking to avoid "text too long" errors (Google limit ~5000 chars)
                translated_texts = []
                chunk_size = 50 
                for i in range(0, len(texts_to_translate), chunk_size):
                    chunk = texts_to_translate[i:i+chunk_size]
                    # Retries
                    for attempt in range(3):
                        try:
                            translated_chunk = translator.translate_batch(chunk)
                            translated_texts.extend(translated_chunk)
                            break
                        except Exception as e:
                            if attempt == 2: raise e
                            time.sleep(1)
                
                # Apply back
                for i, mapping in enumerate(keys_map):
                    tool_slug = mapping['slug']
                    field = mapping['field']
                    tslated = translated_texts[i]
                    
                    if 'meta' not in target_data[tool_slug]:
                        target_data[tool_slug]['meta'] = {}
                    
                    target_data[tool_slug]['meta'][field] = tslated
                    file_needs_update = True
                
            except Exception as e:
                print(f"Error translating batch for {filename} in {lang_dir}: {e}")
                continue

            if file_needs_update:
                with open(target_file_path, 'w', encoding='utf-8') as f:
                    json.dump(target_data, f, indent=4, ensure_ascii=False)
                files_updated += 1
        
        return f"{lang_dir}: Completed ({files_updated} files updated)"

    except Exception as e:
        return f"{lang_dir}: Failed ({e})"

def main():
    if not os.path.exists(ENGLISH_DIR):
        print(f"Error: English directory not found at {ENGLISH_DIR}")
        return

    # Identify languages
    lang_dirs = [d for d in os.listdir(LANG_BASE_DIR) 
                 if os.path.isdir(os.path.join(LANG_BASE_DIR, d)) and d != 'en']

    print(f"Starting optimized translation for {len(lang_dirs)} languages...")
    print("Using ThreadPoolExecutor (max_workers=5)")

    with ThreadPoolExecutor(max_workers=5) as executor:
        futures = {executor.submit(process_language, lang): lang for lang in lang_dirs}
        
        for future in as_completed(futures):
            lang = futures[future]
            try:
                result = future.result()
                print(result)
            except Exception as e:
                print(f"{lang} generated an exception: {e}")

    print("\nTranslation complete!")

if __name__ == '__main__':
    main()
