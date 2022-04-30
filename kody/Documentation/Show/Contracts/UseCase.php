<?php

namespace Kody\Documentation\Show\Contracts;

interface UseCase{
    /**
     * @param null $page
     * @param array $data
     * @return Kody\Documentation\Show\Contracts\Documentation
     */
    public function execute($page);
}