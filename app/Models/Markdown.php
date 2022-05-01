<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Filesystem\Filesystem;

class Markdown{
    public $content;
    protected $files;

    /**
    * Create a new documentation instance.
    *
    * @param Filesystem $files
    * @param Cache $cache
    */

    public function __construct(){
        $this->files = App::make(Filesystem::class);
        $this->content = null;
    }
    /**
    * Set the given documentation page.
    *
    * @param $page
    */

    public function prepareContent($page){
        $path = public_path('blogs/'.$page.'.md');
        if($this->files->exists($path)){
            $this->content = $this->files->get($path);
            $this->replaceUrl();
        }
    }
    protected function replaceUrl(){
        $appUrl = env('APP_URL');
        $pattern = '~(!?)\[(.*)\]\(([\./]+)(.+)\)~';
        
        $this->content = preg_replace_callback($pattern, function($matches) use($appUrl){
            return $matches[1]=='!' ? "![{$matches[2]}]({$appUrl}blogs/{$matches[4]})":"[{$matches[2]}]({$appUrl}{$matches[4]})";
        }
        , $this->content);
    }
    public static function find($page){
        $model = new Markdown();
        $model->prepareContent($page);
        return $model;
    }
}