<?php

namespace Kody\Documentation\Show\Entities;

use Kody\Documentation\Show\Contracts\Documentation as DocumentationContract;
use Kody\Documentation\Show\Contracts\MarkdownParser as MarkdownParserContract;
use Kody\Documentation\Show\Contracts\Crawler as CrawlerContract;
use Kody\Documentation\Show\MarkdownParser;
use Kody\Documentation\Show\Crawler;

class Documentation implements DocumentationContract{
    public $title;
    public $index;
    public $content;
    public $canonical;
    public $currentSection;
    public $statusCode = 200;

    protected ?MarkdownParserContract $parser = null;
    protected ?CrawlerContract $crawler = null;

    public function getTitle(){
        return $this->title;
    }

    public function getIndex(){
        return $this->index;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCanonical(){
        return $this->canonical;
    }

    public function getCurrentSection(){
        return $this->currentSection;
    }

    public function getStatusCode(){
        return $this->statusCode;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setIndex($index){
        $this->index = $index;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setCanonical($canonical){
        $this->canonical = $canonical;
    }

    public function setCurrentSection($currentSection){
        $this->currentSection = $currentSection;
    }

    public function setStatusCode($statusCode){
        $this->statusCode = $statusCode;
    }

    public function prepare($page, $indexMarkdown, $contentMarkdown = null){
        $parser = $this->getParser();
        $index = $parser->parse($indexMarkdown->content);
        $this->setIndex($index);
        if(!is_null($contentMarkdown)){
            $content = $parser->parse($contentMarkdown->content);
            $this->prepareTitle($content);
            $this->prepareContent($content);
        }
        $this->prepareCanonical($page);
        $this->prepareCurrentSection($page);
    }

    /**
    * Prepare the page title from the first h1 found.
    *
    * @return $this
    */
    protected function prepareTitle($content){
        $this->title = $this->getCrawler($content)->filterXPath('//h1');
        $this->setTitle(count($this->title) ? $this->title->text() : null);

        return $this;
    }
    /**
    * Prepare the page content.
    *
    * @return $this
    */
    protected function prepareContent($content){
        $this->setContent($content);
        return $this;
    }
    /**
    * Prepare the canonical link.
    *
    * @return $this
    */
    protected function prepareCanonical($page){
        $this->setCanonical($page);
        return $this;
    }
    /**
    * Prepare the current section page.
    *
    * @param $page
    * @return $this
    */
    protected function prepareCurrentSection($page){
        $this->setCurrentSection($page);
        return $this;
    }

    protected function getParser(){
        if(is_null($this->parser)){
            $this->parser = new MarkdownParser();
        }
        return $this->parser;
    }
    protected function getCrawler($content){
        if(is_null($this->crawler)){
            $this->crawler = new Crawler($content);
        }
        return $this->crawler;
    }
}