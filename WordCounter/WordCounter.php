<?php

namespace WordCounter;
use \WordCounter\Base;

class WordCounter extends Base {

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
        return $this->result;
    }

}