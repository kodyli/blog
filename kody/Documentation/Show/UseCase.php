<?php

namespace Kody\Documentation\Show;

use Kody\Documentation\Show\Contracts\UseCase as ShowDocumentationUseCaseContract;
use Kody\Documentation\Show\Contracts\DocumentationRepository;

class UseCase implements ShowDocumentationUseCaseContract{

    /**
    * @var DocumentationRepository
    */
    protected $documentationRepository;

    public function __construct(DocumentationRepository $documentationRepository){
        $this->documentationRepository = $documentationRepository;
    }

    public function execute($page){
        return $this->documentationRepository->get($page);
    }
}