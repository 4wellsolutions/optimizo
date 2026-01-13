import re
import sys

# Read the file
with open('d:/workspace/optimizo/resources/lang/en/tools/utilities.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Track changes
changes_made = []

# Pattern to find meta sections
# This will match: 'tool-name' => [ ... 'meta' => [ ... ], ... ]
# We need to process each meta section

# Split by tool definitions
tools = re.split(r"(\s+)'([a-z0-9-]+)'\s*=>\s*\[", content)

# Reconstruct with standardized meta sections
result = tools[0]  # PHP opening

for i in range(1, len(tools), 3):
    if i+2 >= len(tools):
        break
    
    indent = tools[i]
    tool_name = tools[i+1]
    tool_content = tools[i+2]
    
    # Find the meta section
    meta_match = re.search(r"(\s+)'meta'\s*=>\s*\[(.*?)\n\s+\],", tool_content, re.DOTALL)
    
    if meta_match:
        meta_indent = meta_match.group(1)
        meta_content = meta_match.group(2)
        
        # Extract existing fields
        fields = {}
        for line in meta_content.split('\n'):
            field_match = re.match(r"\s+'([^']+)'\s*=>\s*'(.*?)',?\s*(?://.*)?$", line)
            if field_match:
                fields[field_match.group(1)] = field_match.group(2)
        
        # Build standardized meta section
        title = fields.get('title') or fields.get('h1') or f"{tool_name.replace('-', ' ').title()}"
        description = fields.get('description') or fields.get('desc') or fields.get('subtitle') or f"Free {tool_name.replace('-', ' ')} tool"
        h1 = fields.get('h1') or fields.get('title') or f"{tool_name.replace('-', ' ').title()}"
        subtitle = fields.get('subtitle') or fields.get('desc') or f"Online {tool_name.replace('-', ' ')} tool"
        
        # Create new meta section
        new_meta = f"""{meta_indent}'meta' => [
{meta_indent}    'title' => '{title}',
{meta_indent}    'description' => '{description}',
{meta_indent}    'h1' => '{h1}',
{meta_indent}    'subtitle' => '{subtitle}',
{meta_indent}],"""
        
        # Replace old meta with new
        tool_content = tool_content.replace(meta_match.group(0), new_meta)
        changes_made.append(f"Updated {tool_name}")
    
    result += indent + "'" + tool_name + "' => [" + tool_content

# Write the result
with open('d:/workspace/optimizo/resources/lang/en/tools/utilities.php', 'w', encoding='utf-8') as f:
    f.write(result)

print(f"Processed {len(changes_made)} tools")
for change in changes_made[:10]:
    print(f"  - {change}")
if len(changes_made) > 10:
    print(f"  ... and {len(changes_made) - 10} more")
