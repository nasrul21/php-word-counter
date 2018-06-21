<?php
namespace WordCounter;

class Base {
    protected $text;
    protected $result;
    protected $sortBy;
    protected $desc;
    protected $limit;
    protected $minLen;

    public function __construct()
    {
        $this->text = "";
        $this->result = [];
        $this->sortBy = "number:desc";
        $this->desc = true;
        $this->limit = 100;
        $this->minLen = 2;
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
}
