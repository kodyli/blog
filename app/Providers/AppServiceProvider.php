<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kody\Documentation\Show\Contracts\DocumentationRepository as DocumentationRepositoryContract;
use Kody\Documentation\Show\Repositories\DocumentationRepository;
use Kody\Documentation\Show\Contracts\UseCase as ShowDocumentationUseCaseContract;
use Kody\Documentation\Show\UseCase as ShowDocumentationUseCase;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
    public $singletons = [
        DocumentationRepositoryContract::class => DocumentationRepository::class,
        ShowDocumentationUseCaseContract::class => ShowDocumentationUseCase::class
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
