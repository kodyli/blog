<?php

namespace Kody\Documentation\Show\Contracts;

interface Documentation{
    public function prepare($page, $indexMarkdown, $contentMarkdown=null);
    public function getTitle();
    public function getIndex();
    public function getContent();
    public function getCanonical();
    public function getCurrentSection();
    public function getStatusCode();
    public function setTitle($title);
    public function setIndex($index);
    public function setContent($content);
    public function setCanonical($canonical);
    public function setCurrentSection($currentSection);
    public function setStatusCode($statusCode);
}