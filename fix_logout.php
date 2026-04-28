<?php

$files = glob(__DIR__ . '/resources/views/livewire/admin/*/*/*.blade.php');
$files = array_merge($files, glob(__DIR__ . '/resources/views/livewire/admin/*.blade.php'));
$files = array_merge($files, glob(__DIR__ . '/resources/views/livewire/admin/*/*.blade.php')); // For Dashboard or index

foreach ($files as $file) {
    $content = file_get_contents($file);
    
    // Replace single line and multi-line variants of the logout link
    $pattern = '/<a href="#"\s*class="([^"]*hover:bg-red-50[^"]*)"\s*>\s*<span>🚪<\/span>\s*<span>Logout<\/span>\s*<\/a>/is';
    
    $replacement = '<form method="POST" action="{{ route(\'logout\') }}" class="w-full">
                    @csrf
                    <button type="submit" class="$1">
                        <span>🚪</span>
                        <span>Logout</span>
                    </button>
                </form>';
                
    $newContent = preg_replace($pattern, $replacement, $content);
    
    if ($content !== $newContent) {
        file_put_contents($file, $newContent);
        echo "Updated $file\n";
    }
}
echo "All done.\n";
