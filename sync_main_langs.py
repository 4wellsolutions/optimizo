import os
import json
from deep_translator import GoogleTranslator

def sync_main_lang(lang_code):
    en_file = r'd:\workspace\optimizo\resources\lang\en.json'
    target_file = fr'd:\workspace\optimizo\resources\lang\{lang_code}.json'
    
    print(f"Loading files for {lang_code}...")
    with open(en_file, 'r', encoding='utf-8') as f:
        en_data = json.load(f)
        
    if os.path.exists(target_file):
        with open(target_file, 'r', encoding='utf-8') as f:
            target_data = json.load(f)
    else:
        target_data = {}
        
    translator = GoogleTranslator(source='en', target=lang_code)
    updated_data = {}
    
    count = 0
    total = len(en_data)
    
    for key, value in en_data.items():
        count += 1
        if key in target_data and target_data[key].strip() != "" and target_data[key] != value:
            # Already translated and doesn't match English
            updated_data[key] = target_data[key]
        else:
            # Needs translation or key is missing
            print(f"[{count}/{total}] Translating: {key}")
            try:
                translated = translator.translate(value)
                updated_data[key] = translated
            except Exception as e:
                print(f"Error translating {key}: {e}")
                updated_data[key] = value # Fallback to English
                
    # Sort keys to match English file order
    final_data = {key: updated_data[key] for key in en_data.keys()}
    
    with open(target_file, 'w', encoding='utf-8') as f:
        json.dump(final_data, f, ensure_ascii=False, indent=4)
    
    print(f"Successfully updated {target_file}")

if __name__ == "__main__":
    import sys
    if len(sys.argv) > 1:
        for lang in sys.argv[1:]:
            sync_main_lang(lang)
    else:
        print("Usage: python sync_main_langs.py <lang_code1> <lang_code2> ...")
