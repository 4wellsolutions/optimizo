#!/usr/bin/env python3
"""
Standardize Meta Description Fields
====================================
This script consolidates 'desc' and 'description' fields in tool JSON files
to use only 'description' across all languages.

Author: Automated Tool
Date: 2026-01-26
"""

import json
import os
import shutil
from pathlib import Path
from datetime import datetime
from typing import Dict, List, Tuple, Any

class MetaFieldStandardizer:
    def __init__(self, base_path: str, dry_run: bool = True):
        self.base_path = Path(base_path)
        self.dry_run = dry_run
        self.changes_log = []
        self.stats = {
            'files_processed': 0,
            'files_modified': 0,
            'desc_to_description': 0,
            'desc_removed': 0,
            'errors': 0
        }
    
    def create_backup(self) -> str:
        """Create a timestamped backup of the lang directory."""
        timestamp = datetime.now().strftime('%Y%m%d_%H%M%S')
        backup_dir = self.base_path.parent / f'lang_backup_{timestamp}'
        
        if not self.dry_run:
            print(f"Creating backup at: {backup_dir}")
            shutil.copytree(self.base_path, backup_dir)
            print(f"✓ Backup created successfully")
        else:
            print(f"[DRY RUN] Would create backup at: {backup_dir}")
        
        return str(backup_dir)
    
    def find_tool_files(self) -> List[Path]:
        """Find all tool JSON files in the lang directory."""
        tool_files = []
        
        # Pattern: resources/lang/*/tools/*.json
        for lang_dir in self.base_path.iterdir():
            if lang_dir.is_dir() and not lang_dir.name.startswith('.'):
                tools_dir = lang_dir / 'tools'
                if tools_dir.exists():
                    for json_file in tools_dir.glob('*.json'):
                        tool_files.append(json_file)
        
        return sorted(tool_files)
    
    def standardize_meta_section(self, meta: Dict[str, Any]) -> Tuple[Dict[str, Any], bool]:
        """
        Standardize a meta section by consolidating desc/description fields.
        
        Returns:
            Tuple of (modified_meta, was_modified)
        """
        modified = False
        
        if 'desc' in meta and 'description' in meta:
            # Both exist - keep description, remove desc
            del meta['desc']
            modified = True
            self.stats['desc_removed'] += 1
            return meta, modified
        
        elif 'desc' in meta and 'description' not in meta:
            # Only desc exists - rename to description
            meta['description'] = meta.pop('desc')
            modified = True
            self.stats['desc_to_description'] += 1
            return meta, modified
        
        # Only description exists or neither - no change needed
        return meta, modified
    
    def process_tool_object(self, tool_data: Dict[str, Any]) -> Tuple[Dict[str, Any], List[str]]:
        """
        Process a single tool object and standardize its meta section.
        
        Returns:
            Tuple of (modified_data, changes_list)
        """
        changes = []
        file_modified = False
        
        if 'meta' in tool_data:
            original_meta = tool_data['meta'].copy()
            standardized_meta, was_modified = self.standardize_meta_section(tool_data['meta'])
            
            if was_modified:
                tool_data['meta'] = standardized_meta
                file_modified = True
                
                if 'desc' in original_meta and 'description' in original_meta:
                    changes.append(f"  - Removed duplicate 'desc' field (kept 'description')")
                elif 'desc' in original_meta:
                    changes.append(f"  - Renamed 'desc' to 'description'")
        
        return tool_data, changes
    
    def process_file(self, file_path: Path) -> bool:
        """
        Process a single JSON file and standardize all tool meta sections.
        
        Returns:
            True if file was modified, False otherwise
        """
        self.stats['files_processed'] += 1
        
        try:
            # Read the file
            with open(file_path, 'r', encoding='utf-8') as f:
                data = json.load(f)
            
            file_changes = []
            file_modified = False
            
            # Process each tool in the file
            for tool_name, tool_data in data.items():
                if isinstance(tool_data, dict):
                    modified_tool, changes = self.process_tool_object(tool_data)
                    
                    if changes:
                        file_modified = True
                        file_changes.append(f"Tool '{tool_name}':")
                        file_changes.extend(changes)
                        data[tool_name] = modified_tool
            
            # Write back if modified
            if file_modified:
                self.stats['files_modified'] += 1
                
                relative_path = file_path.relative_to(self.base_path.parent)
                log_entry = f"\n{relative_path}:\n" + "\n".join(file_changes)
                self.changes_log.append(log_entry)
                
                if not self.dry_run:
                    with open(file_path, 'w', encoding='utf-8') as f:
                        json.dump(data, f, ensure_ascii=False, indent=4)
                    print(f"✓ Modified: {relative_path}")
                else:
                    print(f"[DRY RUN] Would modify: {relative_path}")
            
            return file_modified
            
        except json.JSONDecodeError as e:
            self.stats['errors'] += 1
            error_msg = f"ERROR: Invalid JSON in {file_path}: {e}"
            print(error_msg)
            self.changes_log.append(f"\n{error_msg}")
            return False
        
        except Exception as e:
            self.stats['errors'] += 1
            error_msg = f"ERROR: Failed to process {file_path}: {e}"
            print(error_msg)
            self.changes_log.append(f"\n{error_msg}")
            return False
    
    def generate_report(self, output_file: str = 'meta_standardization_report.txt'):
        """Generate a detailed report of all changes."""
        report_lines = [
            "=" * 80,
            "Meta Field Standardization Report",
            "=" * 80,
            f"Generated: {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}",
            f"Mode: {'DRY RUN' if self.dry_run else 'LIVE EXECUTION'}",
            "",
            "STATISTICS:",
            f"  Files Processed: {self.stats['files_processed']}",
            f"  Files Modified: {self.stats['files_modified']}",
            f"  'desc' → 'description' conversions: {self.stats['desc_to_description']}",
            f"  Duplicate 'desc' removed: {self.stats['desc_removed']}",
            f"  Errors: {self.stats['errors']}",
            "",
            "=" * 80,
            "DETAILED CHANGES:",
            "=" * 80,
        ]
        
        if self.changes_log:
            report_lines.extend(self.changes_log)
        else:
            report_lines.append("\nNo changes were necessary.")
        
        report_content = "\n".join(report_lines)
        
        # Write report
        report_path = Path(output_file)
        with open(report_path, 'w', encoding='utf-8') as f:
            f.write(report_content)
        
        print(f"\n{'=' * 80}")
        print(f"Report saved to: {report_path.absolute()}")
        print(f"{'=' * 80}")
        
        return report_content
    
    def run(self):
        """Main execution method."""
        print("=" * 80)
        print("Meta Field Standardization Tool")
        print("=" * 80)
        print(f"Mode: {'DRY RUN' if self.dry_run else 'LIVE EXECUTION'}")
        print(f"Base Path: {self.base_path}")
        print()
        
        # Create backup (only in live mode)
        if not self.dry_run:
            self.create_backup()
            print()
        
        # Find all tool files
        print("Scanning for tool JSON files...")
        tool_files = self.find_tool_files()
        print(f"Found {len(tool_files)} tool files to process")
        print()
        
        # Process each file
        print("Processing files...")
        print("-" * 80)
        for file_path in tool_files:
            self.process_file(file_path)
        
        print("-" * 80)
        print()
        
        # Generate report
        self.generate_report()
        
        # Print summary
        print("\nSUMMARY:")
        print(f"  Files Processed: {self.stats['files_processed']}")
        print(f"  Files Modified: {self.stats['files_modified']}")
        print(f"  'desc' → 'description': {self.stats['desc_to_description']}")
        print(f"  Duplicate 'desc' removed: {self.stats['desc_removed']}")
        print(f"  Errors: {self.stats['errors']}")
        print()
        
        if self.dry_run:
            print("This was a DRY RUN. No files were actually modified.")
            print("Run with --execute flag to apply changes.")
        else:
            print("✓ All changes have been applied successfully!")


def main():
    import argparse
    
    parser = argparse.ArgumentParser(
        description='Standardize meta description fields in tool JSON files'
    )
    parser.add_argument(
        '--path',
        default='resources/lang',
        help='Path to the lang directory (default: resources/lang)'
    )
    parser.add_argument(
        '--execute',
        action='store_true',
        help='Execute changes (default is dry-run mode)'
    )
    
    args = parser.parse_args()
    
    # Determine base path
    base_path = Path(args.path)
    if not base_path.exists():
        print(f"ERROR: Path does not exist: {base_path}")
        return 1
    
    # Run standardization
    standardizer = MetaFieldStandardizer(
        base_path=str(base_path),
        dry_run=not args.execute
    )
    standardizer.run()
    
    return 0


if __name__ == '__main__':
    exit(main())
