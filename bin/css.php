<?php
// Specify the directory containing your CSS files
$cssDirectory = __DIR__ . '/../src/css';

// Get a list of all CSS files in the directory
$cssFiles = glob($cssDirectory . '/*.css');

// Initialize an empty string to store the combined CSS
$combinedCss = '';

$combinedRootBlock = ":root {\n"; // Start a single :root block

foreach ($cssFiles as $cssFile) {
    $cssContent = file_get_contents($cssFile);

    // Locate the start and end of the :root block
    $start = strpos($cssContent, ':root {');
    $end = strpos($cssContent, '}', $start);

    if ($start !== false && $end !== false) {
        $rootBlock = substr($cssContent, $start, $end - $start + 1);
        $combinedRootBlock .= $rootBlock . "\n";
    }
}

$combinedRootBlock .= "}\n"; // End the single :root block

$combinedCss .= $combinedRootBlock; // Append the :root block to the combined CSS

// Append the rest of the CSS content (outside :root blocks) to the combined CSS
foreach ($cssFiles as $cssFile) {
    $cssContent = file_get_contents($cssFile);

    // Remove :root blocks from the CSS content
    $cssContent = preg_replace('/:root\s*{(.+?)}/s', '', $cssContent);

    // Append the remaining CSS content to the combined CSS
    $combinedCss .= $cssContent . "\n";
}

// Specify the output file where the combined CSS will be saved
$outputFile = __DIR__ . '/../public/css/styles.css';

// Save the combined CSS to the output file
file_put_contents($outputFile, $combinedCss);

echo 'Successfully compiled!';
?>
