<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Markdown{
    public $content;

    /**
    * Create a new documentation instance.
    *
    * @param Filesystem $files
    * @param Cache $cache
    */

    public function __construct(){
        $this->content = null;
    }
    /**
    * Set the given documentation page.
    *
    * @param $page
    */

    public function prepareContent($page){
        $path = 'blogs/'.$page.'.md';
        $storage = Storage::disk('public');
        if($storage->exists($path)){
            $this->content = $storage->get($path);
            $this->correctImageUrl();
        }
    }
    protected function correctImageUrl(){
        $pattern = '~!\[(.*)\]\((\./)(.+)\)~';
        $this->content = preg_replace_callback($pattern, function($matches){
            return '!['.$matches[1].'](./storage/blogs/'.$matches[3].')';
        }
        , $this->content);
    }
    public static function find($page){
        $model = new Markdown();
        $model->prepareContent($page);
        return $model;
    }
}