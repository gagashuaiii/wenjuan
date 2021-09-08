@extends('common.layout')
@section('title','用户详情页')
@section('content')
    <ul class="list-group">
        <li class="list-group-item">用户详情</li>
        <li class="list-group-item">编号：{{$user->id}}</li>
        <li class="list-group-item">用户名：{{$user->username}}</li>
        <li class="list-group-item">邮箱：{{$user->email}}</li>
        <li class="list-group-item">创建日期：{{$user->created_at}}</li>
    </ul>
@endsection
