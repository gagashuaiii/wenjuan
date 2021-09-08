@extends('common.layout')
@section('title','编辑用户')
@section('content')
<div class="tpl-content-wrapper">
	    <div class="tpl-content-page-title">
	        编辑用户
	    </div>
	    <div class="tpl-portlet-components">
	        <div class="tpl-block ">	
	            <div class="am-g tpl-amazeui-form">	
	                <div class="am-u-sm-12 am-u-md-9">
						@if(count($errors)>0)
						    <div class="alert-danger">
						        <ul>
						            @foreach($errors->all() as $errors)
						                <li>{{$errors}}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
	                    <form class="am-form am-form-horizontal" action="/adm/user/edit-user" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}" />
							 <div class="am-form-group">
							     <input type="hidden" class="form-control" id="exampleInputName" placeholder="" name="id" value={{$user->id}}>
							 </div>
							 
	                        <div class="am-form-group">
	                            <label for="user-name" class="am-u-sm-3 am-form-label">用户名</label>
	                            <div class="am-u-sm-9">
	                                <input type="text" class="form-control" id="exampleInputName" placeholder="" name="username" value={{$user->username}} readonly="true">
	                            </div>
	                        </div>
	
	                        <div class="am-form-group">
	                            <label for="user-email" class="am-u-sm-3 am-form-label">邮箱</label>
	                            <div class="am-u-sm-9">
	                                <input type="email" class="form-control" id="exampleInputEmail" placeholder="" name="email" value={{$user->email}} readonly="true">
	                            </div>
	                        </div>
	
	                        <div class="am-form-group">
	                            <label for="user-phone" class="am-u-sm-3 am-form-label">密码</label>
	                            <div class="am-u-sm-9">
	                                 <input type="password" class="form-control" id="exampleInputPassword" placeholder="" name="password" value={{$user->password}}>
	                            </div>
	                        </div>             
	
	                        <div class="am-form-group">
	                            <div class="am-u-sm-9 am-u-sm-push-3">
	                                <button type="submit" class="btn btn-primary">提交</button>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>	
	    </div>	
	</div>
@endsection


