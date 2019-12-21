/**
 * Created by Administrator on 2019\9\15 0015.
 */
$(function(){
    var validate={
        checkAccount:false,
        checkPwd:false,
        checkRepwd:false,
        checkCode:false
    };
    //验证账号
    $("input[name='user_account']").blur(function(){
        var user_account=$(this).val().trim();
        var obj=$(this);
        //验证
        if(user_account==""){
            $(this).next().html("用户账号不能为空").addClass("error");
            validate.checkAccount=false;
            return false;
        }
        if(!/^1[345789]\d{9}$/.test(user_account) && !/^\w+@\w+\.(com|cn)$/.test(user_account)){
            $(this).next().html("用户账为手机号或者邮箱").addClass("error");
            validate.checkAccount=false;
            return false;
        }

        $.ajax({
            type:"get",
            url:checkAccount,
            data:{
                user_account:user_account
            },
            dataType:"json",
            beforeSend:function(){
                obj.next().html("正在请求中...");
            },
            success:function(data){
                if(data.status==1){
                    obj.next().html("重复注册").addClass("error");
                    validate.checkAccount=false;
                }
                if(data.status==0){
                    obj.next().html("可以注册").addClass("success");
                    validate.checkAccount=true;
                }
            },
            error:function(){
                validate.checkAccount=false;
                obj.next().html("网络异常").addClass("error");
            }
        });

    });

    //验证密码
    $("input[name='user_pwd']").blur(function(){
        var user_pwd=$(this).val().trim();
        if(user_pwd==""){
            $(this).next().html("用户密码不能为空").addClass("error");
            validate.checkPwd=false;
            return false;
        }
        if(!/^\w{6,20}$/.test(user_pwd)){
            $(this).next().html("6-20个字母，数字或者下划线").addClass("error");
            validate.checkPwd=false;
            return false;
        }
        $(this).next().html("6-20个字母，数字或者下滑线").removeClass("error");
        validate.checkPwd=true;
    });

    //验证确认密码
    $("input[name='user_repwd']").blur(function(){
        var user_repwd=$(this).val().trim();
        var user_pwd=$("input[name='user_pwd']").val().trim();
        if(user_repwd==""){
            $(this).next().html("确认密码不能为空").addClass("error");
            validate.checkRepwd=false;
            return false;
        }
        if(user_repwd!=user_pwd){
            $(this).next().html("确认密码不一致").addClass("error");
            validate.checkRepwd=false;
            return false;
        }
        $(this).next().html("请再次输入密码").removeClass("error");
        validate.checkRepwd=true;
    });
    //验证码
    $("#sendCode").click(function(){
       var obj=$(this);
        $("input[name='user_account']").trigger("blur");
        var user_account=$("input[name='user_account']").val().trim();
        var status=$(this).attr("status");
            if(status==0){
                $(this).attr("status",1);
                $.ajax({
                    type:"get",
                    url:sendMsg,
                    data:{
                        user_account:user_account
                    },
                    dataType:"json",
                    beforeSend:function(){
                        obj.html("发送中");
                    },
                    success:function(data){
                        //如果成功就倒计时，否则就
                        if(data.status==1){
                            var t=60;
                            var time =setInterval(function(){
                                if(t<=1){
                                    obj.attr("status",0);
                                    obj.html("发送短信");
                                    clearInterval(time);
                                }else{
                                    t--;
                                    obj.html("重发("+t+")");
                                }
                            },1000);
                        }else{
                            obj.attr("status",0);
                            layer.alert('发送短信失败', {
                                icon: 2,
                                skin: 'layer-ext-moon'
                            })
                        }
                    }
                });
            }
    });
    //验证码
    $("input[name='code']").blur(function(){
        var code=$(this).val().trim();
        if(code==""){
            $(this).next().next().addClass("error");
            validate.checkCode=false;
            return false;
        }
        $(this).next().next().removeClass("error");
        validate.checkCode=true;
    });
    //注册
    $("form[name='register']").submit(function(){
        $("input[name='user_account']").trigger("blur");
        $("input[name='user_pwd']").trigger("blur");
        $("input[name='user_repwd']").trigger("blur");
        $("input[name='code']").trigger("blur");
        return validate.checkAccount&&validate.checkPwd&&validate.checkRepwd&&validate.checkCode;

    })
});