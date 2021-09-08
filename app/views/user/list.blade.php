@extends('common.layout')
@section('title','用户管理')
@section('content')
	<div class="tpl-content-wrapper">
            <div class="tpl-content-page-title">
               用户列表页
            </div>
            <div class="tpl-portlet-components">
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a href="/adm/user/add-user">新增</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-id">id</th>
                                            <th class="table-title">username</th>
                                            <th class="table-type">email</th>
                                            <th class="table-type">created_at</th>
											<th class="table-type">updated_at</th>
                                            <th class="table-set">operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($users as $v)
										    <tr>
										        <td>{{$v->id}}</td>
										        <td>{{$v->username}}</td>
										        <td>{{$v->email}}</td>
										        <td>{{$v->created_at}}</td>
										        <td>{{$v->updated_at}}</td>
										        <td>
										            <div class="am-btn-toolbar">
										                <div class="am-btn-group am-btn-group-xs">
										                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> <a href="/adm/user/info/{{$v->id}}">详情</a></button>
										                    <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span><a href="/adm/user/edit-user/{{$v->id}}">编辑</a></button>
										                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span><a href="/adm/user/delete-user/{{$v->id}}">删除</a></button>
										                </div>
										            </div>
										        </td>
										    </tr>
										@endforeach
									</tbody>
                                </table>
                                <hr>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>
		</div>
@endsection
