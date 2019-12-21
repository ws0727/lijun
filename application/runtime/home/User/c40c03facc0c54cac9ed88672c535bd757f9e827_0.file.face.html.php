<?php
/* Smarty version 3.1.33, created on 2019-09-18 23:41:26
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\user\face.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d82502608c7e9_46968006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c40c03facc0c54cac9ed88672c535bd757f9e827' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\user\\face.html',
      1 => 1568814893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5d82502608c7e9_46968006 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
home/css/member.css" />
    <link rel="stylesheet" href="<?php echo resource();?>
home/css/face.css">
   <?php echo '<script'; ?>
 type="text/javascript">
       $(function(){
           $("#face").change(function(){
               //将from表单变成一个formdata对象，通过ajax发过去。
               var formData=new FormData();
               formData.append("file",$("input[name='face']").get(0).files[0]);

               $.ajax({
                   type:"post",
                   url:"",
                   data:formData,
                   contentType: false,
                   processData: false,
                   dataType:"json",
                   success:function(data){
                     if(data.status==1){
                         $("#preview").attr("src",data.path);
                     }else{
                         alert("上传失败");
                     }
                   }
              });
           });
       });
   <?php echo '</script'; ?>
>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top结束 -->
<!--中部-->
<div id='center'>
    <!-- 左侧 -->
    <div id='left'>
        <div class='userinfo'>
            <dl>
                <dt>
                    <a href=""><img src="" width='48' height='48' alt="占位符"/></a>
                </dt>
                <dd class='username'>
                    <a href=""><b>houdun</b>
                    </a>
                    <a href="">
                        <i class='level lv1' title='Level 1'></i>
                    </a>
                </dd>
                <dd>金币：<a href="" style="color: #888888;"><b class='point'>20</b></a></dd>
                <dd>经验值：20</dd>
            </dl>
            <table>
                <tr>
                    <td>回答数</td>
                    <td>采纳率</td>
                    <td class='last'>提问数</td>
                </tr>
                <tr>
                    <td><a href="">20</a></td>
                    <td><a href="">30%</a></td>
                    <td class='last'><a href="">20</a></td>
                </tr>
            </table>
        </div>

        <ul>
            <li class='myhome cur'>
                <a href="">我的首页</a>
            </li>
            <li class='myask'>
                <a href="">我的提问</a>
            </li>
            <li class='myanswer'>
                <a href="">我的回答</a>
            </li>
            <li class='mylevel'>
                <a href="">我的等级</a>
            </li>
            <li class='mygold'>
                <a href="">我的金币</a>
            </li>
            <li class='myface'>
                <a href="">上传头像</a>
            </li>

            <li style="background:none"></li>
        </ul>
    </div>
    <!-- 左侧结束 -->
    <div id='right'>
        <p class='title'>头像上传</p>
        <ul class='ask-filter'>
        </ul>
        <div class='imgface_box'>
            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['user_face'])) {?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_face'];?>
" id="preview">

            <?php } else { ?>
            <img src="<?php echo resource();?>
home/images/profile_avatar.jpg" id="preview">
             <?php }?>
            <form >
                <input type="file" name="face" id="face">
            </form>
            <p>支持JPG、PNG、GIF图片类型，不能大于5M。推荐尺寸：180PX*180PX</p>
        </div>
    </div>
</div>
<!--引入尾部-->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
