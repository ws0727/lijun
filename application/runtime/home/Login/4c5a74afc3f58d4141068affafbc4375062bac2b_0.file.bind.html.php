<?php
/* Smarty version 3.1.33, created on 2019-09-18 22:42:44
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\login\bind.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d824264ce3161_35923166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c5a74afc3f58d4141068affafbc4375062bac2b' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\login\\bind.html',
      1 => 1568817751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d824264ce3161_35923166 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>后盾问答</title>
    <meta name="keywords" content="后盾问答"/>
    <meta name="description" content="后盾问答"/>
    <link rel="stylesheet" href="<?php echo resource();?>
home/css/common.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/jquery-1.7.2.min.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/top-bar.js'><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="<?php echo resource();?>
home/css/index.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/index.js'><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo resource();?>
home/layer/layer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 >
        var checkAccount="<?php echo url('Login/checkAccount');?>
";
        var sendMsg="<?php echo url('Login/sendMsg');?>
";
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo resource();?>
home/js/bind.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id='login' style="margin: 0 auto;position: relative">
    <div class='login-title'>
    <p>欢迎您绑定后盾问答</p>
    </div>
        <div class='login-form'>
        <span id='login-msg'></span>
        <!-- 登录FORM -->
        <form action="" method='post' name='bind'>
            <ul>
            <li>
                <label for="login-acc">用户名</label>
                <input type="text" name='user_account' class='input' id='login-acc'/>
                <spna>请输入用户名</spna>
            </li>
            <li>
                <label for="reg-verify">验证码</label>
                <input type="text" name='code' id='reg-verify' style="height: 34px;width: 150px;margin-right: 35px"/>
                <span status="0" style="display: inline-block;padding: 9px;border:1px solid #ccc;border-radius: 5px;cursor: pointer;margin-right: 20px;" id="sendCode">发送短信</span>
                <span>输入验证码</span>
            </li>
            <li>
            <input name="openid" style="" value="<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
"/>
                <input style="width: 68px;width: 260px;background: deepskyblue" type="submit" value='立即绑定'/>
            </li>
            </ul>
        </form>
        </div>
</div>
<!--------------------内容主体结束-------------------->
<div class='clear'></div>

























<?php }
}
