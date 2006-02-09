#! /usr/bin/env php
<?php
ini_set('error_reporting',E_ALL);

require_once 'Services/OpenSearch.php';

// Koders Source Code Search
$url = 'http://www.koders.com/search/KodersSourceCodeSearchDescription.xml';
$os = new Services_OpenSearch($url);
$items = $os->search('PHP');
$n = 1;
foreach ($items as $item) {
    echo "[$n] {$item['title']}\n{$item['link']}\n\n";
    $n++;
}
?>
