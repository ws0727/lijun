$(function() {
    //定义全局变量
    var validate = {
        checkSign: false,
        checkSignPwd: false
    };

    //登录、
    //用户名文本框失去焦点触发验证事件
    //验证用户名
    $("#login-acc").blur(function() {
        //取值
        $(this).next().remove();
        var sign_name = $(this).val().trim();
        if (sign_name == "") {
            $(this).after("<p class='a'>用户名不能为空</p>");
            $(".a").css("color", "red");
            validate.checkSign = false;
            return false;
        }
        //验证手机号码和邮箱的格式是否正确
        if (!/^1[3456789]\d{9}$/.test(sign_name) && !/^\w+@\w+\.(com|cn|org)$/.test(sign_name)) {
            $(this).after("<p class='a'>用户账号是手机号码或者邮箱</p>");
            $(".a").css("color", "red");
            validate.checkSign = false;
            return false;
        }
        validate.checkSign = true;
        return true;
    });
    //验证密码
    $("#login-pwd").blur(function(){
        $(this).next().remove();
        //取值
        var sign_pwd=$(this).val().trim();
        if(sign_pwd==""){
            $(this).after("<p class='a'>密码不能为空</p>");
            $(".a").css("color","red");
            validate.checkSignPwd=false;
            return false;
        }
        //正则判断密码格式是否合法
        if(!/^\w{6,20}$/.test(sign_pwd)){
            $(this).after("<p class='a'>6-20个字符:字母、数字或下划线 _</p>");
            $(".a").css("color","red");
            validate.checkSignPwd=false;
            return false;
        }
        $(this).after("<p class='a'>6-20个字符:字母、数字或下划线 _</p>");
        validate.checkSignPwd=true;
    });

    //$('#login-btn').click(function(){
    //    var obj=$(this);
    //            $.ajax({
    //                type:"post",
    //                url:login,
    //                data:{
    //                    user_name:user_name
    //                },
    //                   dataType:"json",
    //                    success:function(data){
    //                        if(data.status==1){
    //                            obj.next().html("重复注册").addClass("error");
    //                            validate.checkAccount=false;
    //                        }
    //                        if(data.status==0){
    //                            obj.next().html("可以注册").addClass("success");
    //                            validate.checkAccount=true;
    //                        }
    //                    },
    //                    error:function(){
    //                        validate.checkAccount=false;
    //                        obj.next().html("网络异常").addClass("error");
    //                    }
    //                })
    //            });
             });





