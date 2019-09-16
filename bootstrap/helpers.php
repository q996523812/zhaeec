<?php
function test_helper() {
    return 'OK';
}

    /**
     *@param $modelname 模块名称，例如：zczl、qycg、yxj、cjxx、cjgg、zbtz等
     *@param $title 显示的按钮名称
     */
    function getButtion($modelCode,$id,$btnName){
        $a = "<a href='/admin/".$modelCode."/approval/$id' style='margin-left:10px;'><i class='fa fa-edit'>".$btnName."</i></a>";
        return $a;
    }