@extends('common.layout')
@section('title','答卷列表')
@section('content')
	<div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
               答卷列表页
            </div>
            <div class="tpl-portlet-components">
                <div class="tpl-block">
<div class="am-g">
	    <div class="am-u-sm-12">
	        <form class="am-form">
	            <table class="am-table am-table-striped am-table-hover table-main">
	                <thead>
	                    <tr>
	                        <th class="table-id">ID</th>
	                        <th class="table-title">email</th>
	                        <th class="table-type">ip</th>
							<th class="table-title">对本校学生文明就餐是否满意</th>
							<th class="table-title">桌子上掉落剩菜剩饭</th>
							<th class="table-title">餐具不放回指定地点回收</th>
							<th class="table-title">打饭乱插队</th>
							<th class="table-title">剩菜剩饭太多</th>
							<th class="table-title">在食堂大吵大闹</th>
							<th class="table-title">提交时间</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach($surveys as $v)
	                    	<tr>
	                    		<td>{{$v->id}}</td>
	                    		<td>{{$v->email}}</td>
	                    		<td>{{$v->ip}}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q1==1)?"✓" :"" }}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q21==1)?"✓" :"" }}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q22==1)?"✓" :"" }}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q23==1)?"✓" :"" }}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q24==1)?"✓" :"" }}</td>
	                    		<td style="color: green;font-weight: bold;">{{   ($v->q25==1)?"✓" :"" }}</td>
	                    		<td>{{$v->created_at}}</td>
	                    	</tr>
	                    @endforeach
					</tbody>
				</table>
				{{$surveys->links()}}
			</form>
		</div>
	</div>
                </div>
                <div class="tpl-alert"></div>
            </div>
		</div>
@endsection
