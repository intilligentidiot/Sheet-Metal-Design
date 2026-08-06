import os
import re

def replace_in_file(file_path):
    with open(file_path, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()

    original_content = content
    
    # Skip URL replacement if the file is a blog file
    is_blog_file = 'blog' in file_path.lower()
    
    if not is_blog_file:
        # Replace contact URLs first
        content = re.sub(r'https?://(www\.)?teslamechanicaldesigns\.com/contact/?', '#', content, flags=re.IGNORECASE)
        # Replace other teslamechanicaldesigns.com URLs with /
        content = re.sub(r'https?://(www\.)?teslamechanicaldesigns\.com(?:/[^"\s<]*)?', '/', content, flags=re.IGNORECASE)
    
    # Replace Names (done for all files)
    content = re.sub(r'Tesla\s*Mechanical\s*Designs?', 'Sheet Metal Design Experts', content, flags=re.IGNORECASE)
    content = re.sub(r'\bTMD\b', 'SMDE', content, flags=re.IGNORECASE)
    content = re.sub(r'\bTesla\b', 'Sheet Metal Design', content, flags=re.IGNORECASE)
    
    if content != original_content:
        with open(file_path, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Updated {file_path}")

def main():
    root_dir = r"c:\xampp\htdocs\Sheet-Metal-Design"
    for subdir, dirs, files in os.walk(root_dir):
        if '.git' in subdir:
            continue
        for file in files:
            if file.endswith(('.html', '.md', '.txt', '.xml', '.css', '.js')):
                file_path = os.path.join(subdir, file)
                replace_in_file(file_path)

if __name__ == "__main__":
    main()
