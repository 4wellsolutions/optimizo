import os
import json
import csv
import glob

# Directory containing English tool translations
LANG_DIR = r'd:\workspace\optimizo\resources\lang\en\tools'
CSV_FILE = r'd:\workspace\optimizo\tool_meta_report.csv'
HTML_FILE = r'd:\workspace\optimizo\tool_meta_report.html'

def get_keys(obj, keys):
    for key in keys:
        if isinstance(obj, dict) and key in obj:
            obj = obj[key]
        else:
            return None
    return obj

def main():
    report_data = []

    # 1. Gather Data
    if not os.path.exists(LANG_DIR):
        print(f"Error: Language directory not found at {LANG_DIR}")
        return

    json_files = glob.glob(os.path.join(LANG_DIR, '*.json'))
    
    for json_file in json_files:
        filename = os.path.basename(json_file)
        
        try:
            with open(json_file, 'r', encoding='utf-8') as f:
                data = json.load(f)
                
                for tool_slug, tool_data in data.items():
                    if not isinstance(tool_data, dict):
                        continue
                        
                    meta_title = get_keys(tool_data, ['meta', 'title']) or "N/A"
                    
                    h1 = get_keys(tool_data, ['meta', 'h1'])
                    if not h1:
                        h1 = get_keys(tool_data, ['content', 'hero_title'])
                    if not h1:
                        h1 = get_keys(tool_data, ['content', 'main_title'])
                    if not h1:
                        h1 = "N/A"

                    report_data.append({
                        'File': filename,
                        'Tool Slug': tool_slug,
                        'Meta Title': meta_title,
                        'H1': h1
                    })
                    
        except Exception as e:
            print(f"Error reading {filename}: {e}")

    # 2. Write CSV
    with open(CSV_FILE, 'w', newline='', encoding='utf-8') as csvfile:
        fieldnames = ['File', 'Tool Slug', 'Meta Title', 'H1']
        writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
        writer.writeheader()
        for row in report_data:
            writer.writerow(row)
    print(f"CSV Report generated: {CSV_FILE}")

    # 3. Write HTML
    html_content = """
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Updated Tool Meta & H1 Report</title>
        <style>
            body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f6f8; color: #333; }
            .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            h1 { margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #eee; padding-bottom: 10px; }
            .timestamp { color: #666; font-size: 0.9em; margin-bottom: 20px; }
            table { width: 100%; border-collapse: collapse; margin-top: 10px; }
            th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
            th { background-color: #f8f9fa; font-weight: 600; color: #2c3e50; position: sticky; top: 0; }
            tr:hover { background-color: #f1f1f1; }
            .badge { display: inline-block; padding: 3px 6px; border-radius: 4px; font-size: 12px; font-weight: bold; background-color: #e2e8f0; color: #4a5568; }
            .filename { font-family: monospace; color: #d63384; }
            .slug { font-family: monospace; color: #0969da; }
            .missing { color: #dc2626; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Updated Tool Meta Title & H1 Report</h1>
            <p class="timestamp">Generated from current language files.</p>
            <table>
                <thead>
                    <tr>
                        <th>File</th>
                        <th>Tool Slug</th>
                        <th>Meta Title</th>
                        <th>H1</th>
                    </tr>
                </thead>
                <tbody>
    """

    for row in report_data:
        meta_title = row['Meta Title']
        h1 = row['H1']
        
        meta_class = "missing" if meta_title == "N/A" or not meta_title else ""
        h1_class = "missing" if h1 == "N/A" or not h1 else ""

        html_content += f"""
                <tr>
                    <td class="filename">{row['File']}</td>
                    <td><span class="badge slug">{row['Tool Slug']}</span></td>
                    <td class="{meta_class}">{meta_title}</td>
                    <td class="{h1_class}">{h1}</td>
                </tr>
        """

    html_content += f"""
                </tbody>
            </table>
            <p style="margin-top: 20px; color: #666;">Total Tools: {len(report_data)}</p>
        </div>
    </body>
    </html>
    """

    with open(HTML_FILE, 'w', encoding='utf-8') as f:
        f.write(html_content)

    print(f"HTML Report generated: {HTML_FILE}")

if __name__ == '__main__':
    main()
