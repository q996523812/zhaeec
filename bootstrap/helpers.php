<?php
function test_helper() {
    return 'OK';
}

function replace_information_type($string){
    $str1 = str_replace('1',"原件",$string);
    $str2 = str_replace('2',"复印件",$str1);
    $str3 = str_replace('3',"电子版",$str2);
    return $str3;
}

function get_download_url($file_name,$file_dir){
    return '/download?file_name='.urlencode($file_name).'&file_dir='.urlencode($file_dir);
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
    		case 'ypl':
                $name = '预披露';
                break;
            
    		default:
    			# code...
    			break;
    	}
    	return $name;
    }