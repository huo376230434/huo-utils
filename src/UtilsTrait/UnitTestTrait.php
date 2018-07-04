<?php
namespace HuoUtils\UtilsTrait;



trait UnitTestTrait {


    protected function canTest()
    {
        //为调试模式 才可以

        if(config('app.debug')){
            return true;
        }else{
            throw new \Exception("调试模式才能测试");
        }

    }


    public function test($fun_name,...$string)
    {
        if ($this->canTest()) {
            return $this->$fun_name(...$string);

        }

    }


    public function __set($name,$value){

        if ($this->canTest()) {
            $this->$name = $value;

        }

    }


    public function __get($name)
    {
        if ($this->canTest()) {
            return $this->$name;
        }
    }
}