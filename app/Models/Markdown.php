<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Filesystem\Filesystem;

class Markdown{
    public $content;
    /**
    * The filesystem implementation.
    *
    * @var Filesystem
    */
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
        $path = base_path('blogs/'.$page.'.md');
        if($this->files->exists($path)){
            $this->content = $this->files->get($path);
        }
    }
    
    public static function find($page){
        $model = new Markdown();
        $model->prepareContent($page);
        return $model;
    }
}