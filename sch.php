<?php
// Usage: php download_subtitle.php "movie or series title"

if ($argc < 2) {
    echo "Usage: php download_subtitle.php \"title\"\n";
    exit(1);
}

$title = urlencode($argv[1]);
$searchUrl = "https://subsc.my.id/search?q={$title}";

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $searchUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

// Fetch search results page
$html = curl_exec($ch);
curl_close($ch);

if (!$html) {
    echo "Failed to fetch search results.\n";
    exit(1);
}

// Parse HTML to find subtitle links
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

$xpath = new DOMXPath($dom);

// Example XPath to find subtitle links (adjust based on actual HTML structure)
$links = $xpath->query("//a[contains(@href, '/download/')]");

if ($links->length == 0) {
    echo "No subtitles found for '{$argv[1]}'.\n";
    exit(0);
}

// Download the first subtitle found
$subtitleLink = $links->item(0)->getAttribute('href');
$subtitleUrl = "https://subsc.my.id" . $subtitleLink;

echo "Downloading subtitle from: $subtitleUrl\n";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $subtitleUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');

$subtitleContent = curl_exec($ch);
curl_close($ch);

if (!$subtitleContent) {
    echo "Failed to download subtitle.\n";
    exit(1);
}

// Save subtitle file
$fileName = preg_replace('/[^a-z0-9_\-\.]/i', '_', $argv[1]) . ".srt";
file_put_contents($fileName, $subtitleContent);

echo "Subtitle saved as $fileName\n";
