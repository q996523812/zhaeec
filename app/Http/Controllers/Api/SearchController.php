<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Announcement;
use App\Models\WinNotice;

class SearchController extends Controller
{

	public function getProjectList($project_type,Request $request){
		$projects = Project::where('type',$project_type)->orderBy('gp_date_end','desc')->get();
		$result = [
            'success' => 'true',
            'message' => '',
            'projects' => $projects,
            'status_code' => '200'
        ];
		return $result;
	}

	public function getProjectGpList($project_type,Request $request){
		$projects = Project::where('type',$project_type)->where('status','14')->orderBy('gp_date_end','desc')->get();
		$result = [
            'success' => 'true',
            'message' => '',
            'projects' => $projects,
            'status_code' => '200'
        ];
		return $result;
	}

	public function getProjectInfo($project_id,Request $request){
		$project = Project::find($project_id);
		$result = [
            'success' => 'true',
            'message' => '',
            'project' => $project,
            'status_code' => '200'
        ];
		return $result;
	}

	public function getNoteList(Request $request){
		
		$project = Project::find($project_id);
		$result = [
            'success' => 'true',
            'message' => '',
            'project' => $project,
            'status_code' => '200'
        ];
		return $result;
	}
	public function getNoteInfo(Request $request){
		
		$project = Project::find($project_id);
		$result = [
            'success' => 'true',
            'message' => '',
            'project' => $project,
            'status_code' => '200'
        ];
		return $result;
	}

	public function search(Request $request){
		$project_type = $request->project_type;//项目类型
		$price1 = $request->price1;				//挂牌底价 最低价格
		$price2 = $request->price2;				//挂牌底价 最高价格
		$isguoyou = $request->isguoyou;			//是否国有  1:是；2：否；
		$plfs = $request->plfs;					//披露方式：1 正式披露，2 预披露
		$type = $request->type;					//类型：1：项目，2，成交公告、3、其他公告
		$keyword = $request->keyword;			//关键词

		$records = null;
		$projects = Project::where('status','>=',1);;
		if(isset($project_type)){
			$projects = $projects->where('type',$project_type);
		}
		if(isset($price1) && !isset($price2)){
			$projects = $projects->where('price','>=',$price1);
		}
		else if(!isset($price1) && isset($price2)){
			$projects = $projects->where('price','<=',$price2);
		}
		else if(isset($price1) && isset($price2)){
			$projects = $projects->whereBetween('price', [$price1, $price2]);
		}
		if(isset($keyword)){
			$projects = $projects->where(function ($query) {
			    $query->where('title', 'like', '%'.$keyword.'%')
			          ->orWhere('xmbh', 'like', '%'.$keyword.'%');
			});
		}
		$projects = $projects->select('id','type','xmbh','title','gp_date_start');

		// $projects = Project::where('type',$project_type)
		// 	->whereBetween('price', [$price1, $price2])
		// 	->where(function ($query) {
		// 	    $query->where('title', 'like', '%'.$keyword.'%')
		// 	          ->orWhere('xmbh', 'like', '%'.$keyword.'%');
		// 	})
		// 	->select('id','xmbh','title','gp_date_start');
		$project_ids = $projects->pluck('id');

		$projects = $projects->get();
		$winNotices = WinNotice::whereIn('project_id',iterator_to_array($project_ids))
			->select('id','xmbh','title','issue_time as gp_date_start')->get();;
		$announcements = Announcement::whereIn('project_id',$project_ids)
			->select('id','type','xmbh','title','inscription_date as gp_date_start')->get();;

		$records = array_merge(iterator_to_array($projects),iterator_to_array($winNotices),iterator_to_array($announcements));
		
		$result = [
            'success' => 'true',
            'message' => '',
            'records' => $records,
            'status_code' => '200'
        ];
		return $this->response->array($result)->setStatusCode($result['status_code']);
	}
}
