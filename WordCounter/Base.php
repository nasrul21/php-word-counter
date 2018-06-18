<?php
namespace WordCounter;

class Base {
    protected $text;
    protected $result;
    protected $sortBy;
    protected $desc;

    public function __construct()
    {
        $this->text = "";
        $this->result = [];
        $this->sortBy = "number:desc";
        $this->desc = true;
    }

    protected function splitText() {
        $content = str_replace(["\\n", "\\r", "\\t", "\\\"", "*","  ","   "], " ", $this->text);
        $content = preg_replace('/[^a-zA-Z\']/', ' ', $content);
        $content = explode(" ", $content);
        $content_item = [];
        foreach ($content as $c) {
            if($c !== "") { $content_item[] = strtolower($c); }
        }
        return $content_item;
    }

    public function setText($string)
    {
        $this->text = $string;
    }

    public function sortByNumber($order = "desc")
    {
        $this->sortBy = "number:{$order}";
    }

    public function sortByWord($order = "asc") {
        $this->sortBy = "word:{$order}";
    }
}
