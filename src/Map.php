<?php

namespace Jmnn\Map;

use Jmnn\Map\Contracts\MapInterface;
use Str;

class Map implements MapInterface
{

    public function build($data = [] ,$search = '', $key = 'name')
    {
        return array_filter($data,function ($data) use ($search,$key){
            $name = $this->__convertString($data[$key]);
            return (bool) $this->__macth($search,$name);
        });

    }

    private function __convertString($data)
    {
        return Str::squish(Str::slug($data,' '));
    }

    private function __macth($search , $str)
    {
        $patternString = implode(")|(",array_map(function ($data) {
            return $this->__convertString($data);
        },explode(",",$search)));

        $pattern = '/('.$patternString.')/i';
        return (bool) preg_match($pattern,$str);
    }
}
