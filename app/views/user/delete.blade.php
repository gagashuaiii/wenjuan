@extends('common.layout')
@section('title','删除用户')
@section('content')
    <form method="post" action="/adm/user/delete-user">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <h1 style="text-align: center"> 删除用户</h1>
        <p style="text-align: center">将要删除编号为{{$user->id}}的用户？</p>
        <p></p>
        <div class="form-group">
            <input type="hidden" class="form-control" id="exampleInputName" placeholder="" name="id" value={{$user->id}}>
        </div>
        <div style="text-align: center">
            <a href="/adm/user"><button type="button" class="btn btn-secondary">取消</button></a>
            <button type="submit" class="btn btn-danger">提交</button>
        </div>
    </form>
@endsection


