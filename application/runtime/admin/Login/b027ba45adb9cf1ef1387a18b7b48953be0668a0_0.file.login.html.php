<?php
/* Smarty version 3.1.33, created on 2019-09-03 15:57:52
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\admin\view\login\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6e1d009639e0_82841919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b027ba45adb9cf1ef1387a18b7b48953be0668a0' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\admin\\view\\login\\login.html',
      1 => 1567497471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6e1d009639e0_82841919 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form action="" method="post" >
        <p><input name="user_name" value=""></p>
        <p><input name="user_pwd"></p>
        <p>
           <input name="code">
           <img src="<?php echo url('code');?>
">
        </p>
        <?php echo token();?>

        <input type="submit" value="登录">
    </form>
</body>
</html><?php }
}
