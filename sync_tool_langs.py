import os
import json
from deep_translator import GoogleTranslator

def sync_dict(en_dict, target_dict, translator, path=""):
    updated = {}
    for key, en_value in en_dict.items():
        current_path = f"{path}.{key}" if path else key
        
        if isinstance(en_value, dict):
            sub_target = target_dict.get(key, {})
            updated[key] = sync_dict(en_value, sub_target, translator, current_path)
        elif isinstance(en_value, list):
            sub_target = target_dict.get(key, [])
            updated_list = []
            for i, item in enumerate(en_value):
                try:
                    target_item = sub_target[i] if i < len(sub_target) else item
                except (IndexError, TypeError):
                    target_item = item
                
                if isinstance(item, str) and (target_item == item or not target_item):
                    print(f"Translating list item: {current_path}[{i}]")
                    try:
                        updated_list.append(translator.translate(item))
                    except:
                        updated_list.append(item)
                else:
                    updated_list.append(target_item)
            updated[key] = updated_list
        else:
            target_value = target_dict.get(key, "")
            
            if not target_value or target_value == en_value:
                if isinstance(en_value, str) and en_value.strip():
                    print(f"Translating: {current_path}")
                    try:
                        updated[key] = translator.translate(en_value)
                    except:
                        updated[key] = en_value
                else:
                    updated[key] = en_value
            else:
                updated[key] = target_value
    return updated

def process_lang(lang_code):
    en_dir = r'd:\workspace\optimizo\resources\lang\en\tools'
    target_dir = fr'd:\workspace\optimizo\resources\lang\{lang_code}\tools'
    
    if not os.path.exists(target_dir):
        os.makedirs(target_dir)
        
    translator = GoogleTranslator(source='en', target=lang_code)
    
    files = [f for f in os.listdir(en_dir) if f.endswith('.json')]
    
    for filename in files:
        print(f"\n--- Processing {filename} ({lang_code}) ---")
        en_path = os.path.join(en_dir, filename)
        target_path = os.path.join(target_dir, filename)
        
        with open(en_path, 'r', encoding='utf-8') as f:
            en_data = json.load(f)
            
        if os.path.exists(target_path):
            with open(target_path, 'r', encoding='utf-8') as f:
                target_data = json.load(f)
        else:
            target_data = {}
            
        updated_data = sync_dict(en_data, target_data, translator)
        
        with open(target_path, 'w', encoding='utf-8') as f:
            json.dump(updated_data, f, ensure_ascii=False, indent=4)
            
    print(f"\nCompleted {lang_code} tool files!")

if __name__ == "__main__":
    import sys
    langs = sys.argv[1:] if len(sys.argv) > 1 else ['fi', 'nl']
    for lang in langs:
        process_lang(lang)
