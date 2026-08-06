$rootDir = "c:\xampp\htdocs\Sheet-Metal-Design"

Get-ChildItem -Path $rootDir -Recurse -File -Include *.html, *.md, *.txt, *.xml, *.css, *.js | Where-Object { $_.FullName -notmatch '\\\.git\\' } | ForEach-Object {
    $filePath = $_.FullName
    # Read the file strictly as UTF-8 to prevent character corruption (like bullet points and dashes)
    $content = [System.IO.File]::ReadAllText($filePath, [System.Text.Encoding]::UTF8)
    $originalContent = $content

    if ($content -ne $null) {
        # Skip URL replacement if the file is a blog file
        if ($filePath -notmatch '(?i)blog') {
            # Replace URLs
            $content = [regex]::Replace($content, '(?i)https?://(www\.)?teslamechanicaldesigns\.com/contact/?', '#')
            $content = [regex]::Replace($content, '(?i)https?://(www\.)?teslamechanicaldesigns\.com(?:/[^"\s<]*)?', '/')
        }

        # Replace Names (done for all files)
        $content = [regex]::Replace($content, '(?i)Tesla\s+Mechanical\s+Designs?', 'Sheet Metal Design Experts')
        $content = [regex]::Replace($content, '(?i)\bTMD\b', 'SMDE')
        $content = [regex]::Replace($content, '(?i)\bTesla\b(?!\.com|mechanicaldesigns\.com)', 'Sheet Metal Design')

        if ($content -ne $originalContent) {
            # Write the file strictly as UTF-8 without BOM
            $utf8NoBom = New-Object System.Text.UTF8Encoding $false
            [System.IO.File]::WriteAllText($filePath, $content, $utf8NoBom)
            Write-Host "Updated $filePath"
        }
    }
}
