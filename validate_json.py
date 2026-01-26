import os
import json
import glob

LANG_BASE_DIR = r'd:\workspace\optimizo\resources\lang'

def main():
    print("Validating JSON files...")
    errors = []
    
    # Walk through all directories
    for root, dirs, files in os.walk(LANG_BASE_DIR):
        for file in files:
            if file.endswith('.json'):
                path = os.path.join(root, file)
                try:
                    with open(path, 'r', encoding='utf-8') as f:
                        json.load(f)
                except json.JSONDecodeError as e:
                    errors.append(f"{path}: {e}")
                except Exception as e:
                    errors.append(f"{path}: {e}")

    if errors:
        print(f"Found {len(errors)} JSON errors:")
        for err in errors:
            print(f" - {err}")
    else:
        print("All JSON files are valid.")

if __name__ == '__main__':
    main()
