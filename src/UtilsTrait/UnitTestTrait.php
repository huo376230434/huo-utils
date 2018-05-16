<?php
namespace HuoUtils\UtilsTrait;



trait UnitTestTrait {

    public function test($fun_name,...$string)
    {

        return $this->$fun_name(...$string);

    }
}