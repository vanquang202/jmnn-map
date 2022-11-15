<?php

namespace Jmnn\Map;

use Jmnn\Map\Contracts\MapInterface;
use Str;

class Map implements MapInterface
{

    public function build($data = [] ,$search = '', $key = 'name' , $arrayKeyTree = ['district','town'])
    {

        return array_filter($data,function ($data) use ($search , $key, $arrayKeyTree) {
            return $this->__callback($data, $search, $key, $arrayKeyTree);
        });

    }

    private function __callback($data , $search , $key , $arrayKeyTree){
        $name = $data[$key];
        $flag = false;
        if($keyData = $this->__checkKeyArray($data, $arrayKeyTree)) $flag = true ;
        return (bool) $this->__match($search,$name) ?: ($flag ? $this->__callback($data[$keyData], $search, $key, $arrayKeyTree) : false);
    }

    private function __checkKeyArray ($data ,$arrayKeyTree )
    {
        foreach ($arrayKeyTree as $key)
        {
            if(isset($data[$key])) return $key;
        }
        return false;
    }

    private function __convertString($data,$flagSlug = true)
    {
        if($flagSlug) return Str::squish(Str::slug($data, " "));
        return  Str::squish($data);
    }

    private function __match($search , $str)
    {
        $str = $this->__convertString($str);
        $ex = explode(",",$search);
        $flag = false;
        $patternString = $this->__cvPatternString($ex);

        $pattern = '/('.$patternString.')/i';

        $searchNew = $this->__cvPatternNewString($ex);
        if(trim($searchNew) == "") $flag = true;
        return (bool) preg_match($pattern,$str) ?: ($flag ? false :  $this->__match($searchNew , $str));

    }

    private function __cvPatternString($ex)
    {

        return  implode(")|(",array_map(function ($data) {

            $exT = preg_split("/\s+/",$this->__convertString($data));
            $array = array_chunk($exT,2);
            $result = implode(")|(",array_map(function ($data) {
                if(count($data) > 1) return implode(" ",$data);
                return "Default";
            },$array));
            return $this->__convertString("$result",false);

        },$ex));

    }

    private function __cvPatternNewString($ex)
    {
        return trim(implode(",",array_map(function ($data)   {
            $exT = preg_split("/\s+/",$this->__convertString($data));
            unset($exT[0]);
            if(count($exT) < 2) return "";
            return implode(" ",$exT);
        },$ex)),",");

    }
}
