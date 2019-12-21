/**
 * Created by Administrator on 2019\9\18 0018.
 */
$(function() {
    var validate = {
        checkAccount: false,
        checkCode: false
    };
    //验证账号
    $("input[name='user_account']").blur(function () {
        var user_account = $(this).val().trim();
        var obj = $(this);
        //验证
        if (user_account == "") {
            $(this).next().html("用户账号不能为空").addClass("error");
            validate.checkAccount = false;
            return false;
        }
        if (!/^1[345789]\d{9}$/.test(user_account) && !/^\w+@\w+\.(com|cn)$/.test(user_account)) {
            $(this).next().html("用户账为手机号或者邮箱").addClass("error");
            validate.checkAccount = false;
            return false;
        }
        validate.checkAccount = true;
        return true;
    });

    //验证码
    $("#sendCode").click(function () {
        var obj = $(this);
        $("input[name='user_account']").trigger("blur");
        var user_account = $("input[name='user_account']").val().trim();
        var status = $(this).attr("status");
        if (validate.checkAccount) {
            if (status == 0) {
                $(this).attr("status", 1);
                $.ajax({
                    type: "get",
                    url: sendMsg,
                    data: {
                        user_account: user_account
                    },
                    dataType: "json",
                    beforeSend: function () {
                        obj.html("发送中");
                    },
                    success: function (data) {
                        //如果成功就倒计时，否则就
                        if (data.status == 1) {
                            var t = 60;
                            var time = setInterval(function () {
                                if (t <= 1) {
                                    obj.attr("status", 0);
                                    obj.html("发送短信");
                                    clearInterval(time);
                                } else {
                                    t--;
                                    obj.html("重发(" + t + ")");
                                }
                            }, 1000);
                        } else {
                            obj.attr("status", 0);
                            layer.alert('发送短信失败', {
                                icon: 2,
                                skin: 'layer-ext-moon'
                            })
                        }
                    }
                });
            }
        }
    });
    //验证码
    $("input[name='code']").blur(function () {
        var code = $(this).val().trim();
        if (code == "") {
            $(this).next().next().addClass("error");
            validate.checkCode = false;
            return false;
        }
        $(this).next().next().removeClass("error");
        validate.checkCode = true;
    });
});