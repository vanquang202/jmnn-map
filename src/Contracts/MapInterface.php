<?php

namespace Jmnn\Map\Contracts;

interface MapInterface
{
    public function build($data = [] ,$search = '', $key = 'name');
}
