<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>survey</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css" />
    <script src="/assets/js/jquery-1.7.2.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <img src="/assets/images/xueyuan.jpg" />
    </div>
    <div class="survey_box">
        <h3>大学生文明就餐情况调查</h3>
        <div class="welcome">
            <p>您好！</p>
            <p class="thanks">感谢您使用本次问卷，为我们提供数据。希望您对我们的题目进行认真选择，以便我们准确了解学生的需求并提供更好的服务。</p>
        </div>
        <div class="survey_body">
            <div class="email">
                <label>您的邮箱是</label>
                <input type="text" name="email" id="email" value="{{$email}}"/>
            </div>
            <div class="ques_one">
                <p>问题1: 您对本校大学生文明就餐是否满意？</p>
                <p>
                    <input type="radio" name="q1" value="1" id="q11" checked/><span>满意</span>
                    <input type="radio" name="q1" value="0" id="q12"/><span>不满意</span>
                </p>
            </div>
            <div class="ques_one" id="q2" style="display: none">
                <p>问题2: 若不满意，体现在哪些方面改进?</p>
                <p>
                    <input type="checkbox" id="q21" value="1" />桌子上掉落剩菜剩饭
                </p>
                <p>
                    <input type="checkbox" id="q22" value="2"/>餐具不放回指定地点回收
                </p>
                <p>
                    <input type="checkbox" id="q23" value="3"/>打饭乱插队
                </p>
                <p>
                    <input type="checkbox" id="q24" value="4"/>剩菜剩饭太多
                </p>
                <p>
                    <input type="checkbox" id="q25" value="5"/>在食堂大吵大闹
                </p>
            </div>
        </div>
        <div class="submit_btn">
            <input type="button" class="btn" value="提交" id="btn_submit"/>
        </div>
        <script type="text/javascript">
            $(function(){
                $("#q11").click(function (){
                    $("#q2").hide();
                });
                $("#q12").click(function (){
                    $("#q2").show();
                });
                $("#btn_submit").click(function (){
                    var q1=$("[name='q1']:checked").eq(0).val();
                    if(q1==1){
                        data={
                            'email':$("#email").val(),
                            'q1':1,
                            '_token':"{{csrf_token()}}"
                        };
                    }
                    else {
                        data={
                            'email':$("#email").val(),
                            'q1':0,
                            '_token':"{{csrf_token()}}",
                            'q21':($("#q21")[0].checked)?1:0,
                            'q22':($("#q22")[0].checked)?1:0,
                            'q23':($("#q23")[0].checked)?1:0,
                            'q24':($("#q24")[0].checked)?1:0,
                            'q25':($("#q25")[0].checked)?1:0
                        };
                    }
                    $.post('/',data,function (data) {
                        if (data.success)
                        {
                            alert(data.msg);
                            location.reload();
                        }
                        else
                            alert(data.msg);
                    },'json')
                });
            })
        </script>
    </div>
</div>
</body>
</html>
