<?php
namespace WordCounter;

class Base {
    protected $text;
    protected $result;
    protected $sortBy;
    protected $desc;
    protected $limit;
    protected $minLen;
    protected $skipWords;

    public function __construct() {
    }

    public function setText($string)
    {
        $this->text = $string;
    }

    public function sortByNumber($order = "desc") {
        $this->sortBy = "number:{$order}";
    }

    public function sortByWord($order = "asc") {
        $this->sortBy = "word:{$order}";
    }

    public function limit($limit) {
        $this->limit = $limit;
    }

    public function minLen($minLen) {
        $this->minLen = $minLen;
    }

    public function skipWords($words)
    {
        $this->skipWords = $words;
    }
}
