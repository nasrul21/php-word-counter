# php-word-counter
A simple package to count the number of texts by word

## Getting Started
### Prerequisites
* PHP >= 5.6
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP

### Installing
```
composer require "nasrulfaizin/php-word-counter:dev-master"
```

### Usage
```
<?php

include "vendor/autoload.php";

use WordCounter\WordCounter;

$text = "Indonesia was formerly known as the Dutch East Indies (or Netherlands East Indies). Although Indonesia did not become the country’s official name until the time of independence, the name was used as early as 1884 by a German geographer; it is thought to derive from the Greek indos, meaning “India,” and nesos, meaning “island.” After a period of occupation by the Japanese (1942–45) during World War II, Indonesia declared its independence from the Netherlands in 1945. Its struggle for independence, however, continued until 1949, when the Dutch officially recognized Indonesian sovereignty. It was not until the United Nations (UN) acknowledged the western segment of New Guinea as part of Indonesia in 1969 that the country took on its present form. The former Portuguese territory of East Timor (Timor-Leste) was incorporated into Indonesia in 1976. Following a UN-organized referendum in 1999, however, East Timor declared its independence and became fully sovereign in 2002.";

$counter = new WordCounter($text);
// set minimum word length
$counter->minLen(3);
// set limit of result
$counter->limit(20);
// set an array of words to skip counting
$counter->skipWords(["the", "in", "of", "as", "its", "it", "was", "not", "by", "and", "did", "to", "or", "for", "is", "until", "from"]);

// sort by number, params 'asc / desc', default "desc"
$counter->sortByNumber("desc");

// sort by word, params 'asc / desc', default "asc"
// $counter->sortByWord("desc");
header("Content-Type:application/json");
echo json_encode($counter->get());

/*
Output:
{"indonesia":5,"independence":4,"east":4,"timor":3,"meaning":2,"name":2,"dutch":2,"netherlands":2,"declared":2,"country":2,"indies":2,"however":2,"segment":1,"officially":1,"guinea":1,"western":1,"new":1,"recognized":1,"united":1,"indonesian":1}
*/
```