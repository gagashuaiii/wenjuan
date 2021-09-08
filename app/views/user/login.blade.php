<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="assets/css/admin.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="/assets/js/jquery-1.7.2.min.js"></script>
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				Amaze UI<span> Login</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		<div class="login-font">
			<i>Log In </i> or <span> Sign Up</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form">
				<fieldset>
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="am-form-group">
						<input type="text" name="username" id="username" value="" placeholder="输入用户名">
					</div>
					<div class="am-form-group">
						<input type="password" name="password" id="password" value="" placeholder="输入密码">
					</div>
					<p><button name="dosubmit" type="button" onclick="login()" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
		</div>
	</div>
</div>

  <script src="assets/js/jquery-2.1.1.js"></script>
  <script src="assets/js/amazeui.min.js"></script>
  <script src="assets/js/app.js"></script>
  
</body>
</html>
<script type="text/javascript">
    function login(){
        var username=document.getElementById('username');
        var password=document.getElementById('password');
        $.ajax({
            data:{"username":username.value,"password":password.value},
            url: "/login",
            dataType:"json",
            type:"POST",
            header: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                if(!data.status){
                    alert("登录失败，用户名或密码错误！");
                    window.location.href="/login";
                }
                else{
                    alert("登录成功！");
                    window.location.href="/adm";
                }
            },
            error:function(data){
                alert("错误信息");
            }
        })
    }
</script>