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

    function getXmlxName($type){
    	$name = '';
    	switch ($type) {
    		case 'qycg':
    			$name = '企业采购';
    			break;
    		case 'zczl':
    			$name = '资产租赁';
    			break;
    		case 'cqzr':
    			$name = '产权转让';
    			break;
    		case 'zzkg':
    			$name = '增资扩股';
    			break;
    		case 'zczr':
    			$name = '资产转让';
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    	return $name;
    }