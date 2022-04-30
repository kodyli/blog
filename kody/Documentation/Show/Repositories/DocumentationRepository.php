<?php

namespace Kody\Documentation\Show\Repositories;

use Kody\Documentation\Show\Contracts\DocumentationRepository as DocumentationRepositoryContract;
use Kody\Documentation\Show\Entities\Documentation;
use App\Models\Markdown as MarkdownModel;

class DocumentationRepository implements DocumentationRepositoryContract{

    
    public function get($page){
        $content = MarkdownModel::find($page);
        if(is_null($content->content)){
            return $this->prepareNotFound($page);
        }
        $index = MarkdownModel::find('index');
        $doc = new Documentation();
        $doc->prepare($page, $index, $content);
        return $doc;
    }

    /**
    * If the docs content is empty then show 404 page.
    *
    * @return Kody\Documentation\Show\Contracts\Documentation
    */
    protected function prepareNotFound($page){
        $index = MarkdownModel::find('index');
        $doc = new Documentation();
        $doc->prepare($page, $index);
        $doc->setTitle('Page not found');
        $doc->setContent('Page, '.$page.', not found');
        $doc->setCurrentSection('');
        $doc->setCanonical('');
        $doc->setStatusCode(404);
        return $doc;
    }
}
