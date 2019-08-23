<?php

namespace App\Exceptions;

use Exception;

/** 自定义的一个异常处理类，处理数据校验手动抛出的异常
 *
 */
class VerifyException extends Exception{
	//重定义构造器使第一个参数 message 变为必须被指定的属性
	public function __construct($message, $code=0){
	    //可以在这里定义一些自己的代码
	 //建议同时调用 parent::construct()来检查所有的变量是否已被赋值
	    parent::__construct($message, $code);
	}	
	public function __toString() {        
      //重写父类方法，自定义字符串输出的样式
	  return __CLASS__.":[".$this->code."]:".$this->message."<br>";
	}
	public function customFunction() {    
         //为这个异常自定义一个处理方法
	     echo "按自定义的方法处理出现的这个类型的异常<br>";
	}
}