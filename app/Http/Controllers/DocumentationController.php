<?php
namespace App\Http\Controllers;

use Kody\Documentation\Show\Contracts\UseCase as ShowDocumentationUseCase;

class DocumentationController extends Controller{
    protected $showDocumentationUseCase;

    public function __construct(ShowDocumentationUseCase $showDocumentationUseCase){
        $this->showDocumentationUseCase = $showDocumentationUseCase;
    }

    /**
    * Redirect the index page of docs to the default version.
    *
    * @return \Illuminate\Http\RedirectResponse
    */

    public function index(){
        return redirect()->route(
            'documentation.show',
            [
                'page' => 'updates'
            ]
        );
    }
    /**
    * Show a documentation page.
    *
    * @param null $page
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
    * @throws \Illuminate\Auth\Access\AuthorizationException
    */

    public function show($page){
        $documentation = $this->showDocumentationUseCase->execute($page);
        
        return response()->view('docs', [
            'title'          => $documentation->getTitle(),
            'index'          => $documentation->getIndex(),
            'content'        => $documentation->getContent(),
            'currentSection' => $documentation->getCurrentSection(),
            'canonical'      => $documentation->getCanonical(),
        ], $documentation->getStatusCode());
    }
}
