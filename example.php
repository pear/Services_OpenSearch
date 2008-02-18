#!/usr/bin/env php
<?php
ini_set('error_reporting',E_ALL);

require_once 'Services/OpenSearch.php';

$desc_url = array(
    // Koders Source Code Search / OpenSearch 1.0
    'koders'    => 'http://www.koders.com/search/KodersSourceCodeSearchDescription.xml',
    // Wikipedia (English)       / OpenSearch 1.1
    'wikipedia' => 'http://en.wikipedia.org/w/opensearch_desc.php',
    );

$url = 'http://www.koders.com/search/KodersSourceCodeSearchDescription.xml';
if ($argc >= 2 && isset($desc_url[ $argv[1] ])) {
    $url = $desc_url[ $argv[1] ];
}

$os = new Services_OpenSearch($url);

$word = 'PHP';

$url = $os->getSearchURLfor($word);
print_r($url);

$result = $os->search($word);

if (is_array($result)) {
    // RSS or Atom
    $n = 1;
    foreach ($result as $item) {
        echo "[$n] {$item['title']}\n{$item['link']}\n\n";
        $n++;
    }
} else if (is_string($result)) {
    // HTML or XHTML
    echo substr($result,0,400),"\n";
} else {
    die("hmmm");
}
?>
