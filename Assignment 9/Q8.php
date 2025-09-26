<?php

$inputFile = "data.txt";
$outputFile = "numbers.txt";

if (!file_exists($inputFile)) {
    die(" Input file '$inputFile' not found.");
}

$content = file_get_contents($inputFile);

preg_match_all("/\b\d{10}\b/", $content, $matches);
if (!empty($matches[0])) {
    file_put_contents($outputFile, implode("\n", $matches[0]));
    echo "<h3> Extracted mobile numbers saved to '$outputFile'</h3>";
    echo "<ul>";
    foreach ($matches[0] as $number) {
        echo "<li>$number</li>";
    }
    echo "</ul>";
} else {
    echo "<h3> No valid mobile numbers found in '$inputFile'</h3>";
}
?>
