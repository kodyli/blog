<?php

namespace Kody\Documentation\Show\Contracts;

interface DocumentationRepository
{
    /**
     * @param null $page
     * @return Kody\Documentation\Show\Contracts\Documentation
     */
    public function get($page);
}