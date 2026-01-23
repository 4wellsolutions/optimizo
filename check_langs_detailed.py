import json
import os

files = ['converters.json', 'development.json', 'image.json', 'spreadsheet.json', 'youtube.json']
en_dir = r'd:\workspace\optimizo\resources\lang\en\tools'
pt_dir = r'd:\workspace\optimizo\resources\lang\pt\tools'

def get_keys(d, prefix=''):
    keys = {}
    for k, v in d.items():
        new_prefix = f"{prefix}.{k}" if prefix else k
        if isinstance(v, dict):
            keys.update(get_keys(v, new_prefix))
        elif isinstance(v, list):
            for i, item in enumerate(v):
                keys[f"{new_prefix}.{i}"] = item
        else:
            keys[new_prefix] = v
    return keys

report = ""
for f in files:
    en_path = os.path.join(en_dir, f)
    pt_path = os.path.join(pt_dir, f)
    
    with open(en_path, 'r', encoding='utf-8') as file:
        en_data = json.load(file)
    with open(pt_path, 'r', encoding='utf-8') as file:
        pt_data = json.load(file)
    
    en_keys = get_keys(en_data)
    pt_keys = get_keys(pt_data)
    
    missing = [k for k in en_keys if k not in pt_keys]
    empty = [k for k, v in pt_keys.items() if not v and k in en_keys]
    
    if missing or empty:
        report += f"--- {f} ---\n"
        if missing:
            report += f"Missing keys: {missing}\n"
        if empty:
            report += f"Empty keys: {empty}\n"
        report += "\n"

with open(r'd:\workspace\optimizo\lang_report.txt', 'w', encoding='utf-8') as f:
    f.write(report)
