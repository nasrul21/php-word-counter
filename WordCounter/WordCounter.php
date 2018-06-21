<?php

namespace WordCounter;
use \WordCounter\Base;

class WordCounter extends Base {

    public function __construct($text)
    {
        $this->text = $text;
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

    public function get()
    {
        $content_item = $this->splitText();
        $this->result = array_count_values($content_item);
        $sort = explode(":", $this->sortBy);
        if($sort[0] == "number") {
            switch ($sort[1]) {
                case 'asc':
                    asort($this->result);
                    break;
                case 'desc':
                default:
                    arsort($this->result);
                    break;
            }
        } else {
            switch ($sort[1]) {
                case 'desc':
                    krsort($this->result);
                    break;
                case 'asc':
                default:
                    ksort($this->result);
                    break;
            }
        }

        if($this->minLen > 0) {
            $this->result = array_filter($this->result, function($key) {
                return strlen($key) >= $this->minLen;
            }, ARRAY_FILTER_USE_KEY);
        }

        return array_slice($this->result, 0, $this->limit);
    }

}