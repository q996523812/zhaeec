<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{$project->name}}</title>
	<meta name="description" content="" />
	<meta name="keyword" content="" />
	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	@yield('styles')
</head>

<body>
	<div id="app">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-9 print">
					<table class="project-table table">
						<thead class="thead">
					        <tr>
					        	<th style="width:25%;"></th>
					        	<th style="width:25%;"></th>
					        	<th style="width:25%;"></th>
					        	<th style="width:25%;"></th>
					        </tr>
					    </thead> 
						<tbody>
							<!--基本信息-->
							@include('admin.project.'.$project->type.'._print')
							
							@if($projecttype == 'zczr')
								<!--标的详细信息-->
								@include('admin.project.fsxx.bdxq._print')
							@endif
							@if($projecttype == 'cqzr' || $projecttype == 'ypl')
								<!--标的企业情况-->
								@@include('admin.project.fsxx.bdqy._print')
							@endif
							<!--委托方-->
							@include('admin.project.fsxx.zrf._print')

							@if($projecttype == 'cqzr' || $projecttype == 'zzkg' || $projecttype == 'ypl')
								<!--财务信息-->
								@include('admin.project.fsxx.sjbg._print')
								@include('admin.project.fsxx.cwbb._print') 
							@endif
							@if($projecttype == 'cqzr' || $projecttype == 'zzkg' || $projecttype == 'zczr')
								<!--评估情况-->
								@include('admin.project.fsxx.pgqk._print')
							@endif
							@if($projecttype == 'cqzr' || $projecttype == 'zzkg' || $projecttype == 'zczr' || $projecttype == 'ypl')
								<!--监管信息-->
								@include('admin.project.fsxx.jgxx._print')
							@endif
							<!--联系方式-->
							@include('admin.project.fsxx.lxfs._print')
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>