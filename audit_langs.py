import os
import json
import sys

def audit_lang(lang_code):
    en_dir = r'd:\workspace\optimizo\resources\lang\en\tools'
    target_dir = fr'd:\workspace\optimizo\resources\lang\{lang_code}\tools'
    
    if not os.path.exists(target_dir):
        print(f"Directory {target_dir} does not exist.")
        return

    files = [f for f in os.listdir(en_dir) if f.endswith('.json')]
    report = []
    
    for filename in files:
        en_path = os.path.join(en_dir, filename)
        target_path = os.path.join(target_dir, filename)
        
        with open(en_path, 'r', encoding='utf-8') as f:
            en_data = json.load(f)
            
        if not os.path.exists(target_path):
            report.append(f"{filename}: FILE MISSING")
            continue
            
        with open(target_path, 'r', encoding='utf-8') as f:
            target_data = json.load(f)
            
        missing_keys = []
        untranslated = []
        
        def check_data(en, target, path=""):
            if isinstance(en, dict):
                for k, v in en.items():
                    new_path = f"{path}.{k}" if path else k
                    if k not in target:
                        missing_keys.append(new_path)
                    else:
                        check_data(v, target[k], new_path)
            elif isinstance(en, list):
                if not isinstance(target, list) or len(target) != len(en):
                    missing_keys.append(path)
                else:
                    for i in range(len(en)):
                        check_data(en[i], target[i], f"{path}[{i}]")
            else:
                if target == en and en != "":
                    untranslated.append(path)
                    
        check_data(en_data, target_data)
        
        if missing_keys or untranslated:
            report.append(f"{filename}: {len(missing_keys)} missing keys, {len(untranslated)} untranslated")
            if missing_keys:
                report.append(f"  Missing: {missing_keys[:5]}...")
            if untranslated:
                report.append(f"  Untranslated: {untranslated[:5]}...")
        else:
            report.append(f"{filename}: OK")
            
    with open(f'audit_{lang_code}.txt', 'w', encoding='utf-8') as f:
        f.write("\n".join(report))
    print(f"Audit report saved to audit_{lang_code}.txt")

if __name__ == "__main__":
    if len(sys.argv) > 1:
        for lang in sys.argv[1:]:
            audit_lang(lang)
    else:
        print("Usage: python audit_langs.py <lang1> <lang2> ...")
