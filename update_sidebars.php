<?php

$files = glob(__DIR__ . '/resources/views/livewire/admin/*/*/*.blade.php');
$files = array_merge($files, glob(__DIR__ . '/resources/views/livewire/admin/*.blade.php'));
$files = array_merge($files, glob(__DIR__ . '/resources/views/livewire/admin/*/*.blade.php'));

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Check if the file has the old sidebar
    if (strpos($content, '<aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">') !== false) {
        
        // Use regex to replace the entire <aside> block, accounting for nested divs/navs inside it
        // The regex looks for the specific opening aside tag and matches everything until the first </aside> 
        // since there's only one aside block at the root level of the layout.
        $pattern = '/<aside class="w-full border-r border-slate-200 bg-white lg:sticky lg:top-0 lg:h-screen lg:w-72">.*?<\/aside>/s';
        
        $newContent = preg_replace($pattern, '<x-admin.sidebar />', $content);
        
        if ($newContent !== null && $content !== $newContent) {
            file_put_contents($file, $newContent);
            echo "Updated $file\n";
        }
    }
}
echo "All done.\n";
