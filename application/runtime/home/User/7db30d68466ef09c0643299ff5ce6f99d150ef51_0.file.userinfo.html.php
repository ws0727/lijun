<?php
/* Smarty version 3.1.33, created on 2019-09-21 18:17:17
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\user\userinfo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d85f8adcd3be4_07752872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7db30d68466ef09c0643299ff5ce6f99d150ef51' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\user\\userinfo.html',
      1 => 1569061034,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/left.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5d85f8adcd3be4_07752872 (Smarty_Internal_Template $_smarty_tpl) {
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
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top结束 -->
<!--------------------中部-------------------->
<div id='center'>
    <!-- 左侧 -->
    <?php $_smarty_tpl->_subTemplateRender('file:public/left.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- 左侧结束 -->
    <div id='right'>

        <p class='title'>我的首页</p>

        <ul class='property'>
            <li>金币：<span>20</span></li>
            <li>经验值：<span>30</span></li>
            <li>采纳率：<span>100%</span></li>
        </ul>
        <div class='list'>
            <p><span>我的提问 <b>(共100条)</b></span><a href="">更多>></a></p>
            <table>

                <tr height='140'>
                    <td>你还没有进行过提问</td>
                </tr>

                <tr>
                    <th class='t1'>标题</th>
                    <th>回答数</th>
                    <th class='t3'>更新时间</th>
                </tr>

                <tr>
                    <td class='t1'>
                        <a href="">什么牌子的电脑最好？</a><span>[电脑/硬件]</span>
                    </td>
                    <td>20</td>
                    <td class='t3'>1900.1.1</td>
                </tr>
            </table>
        </div>
        <div class='list'>
            <p><span>我的回答 <b>(共20条)</b></span><a href="">更多>></a></p>
            <table>

                <tr height='140'>
                    <td>你还没有进行过回答</td>
                </tr>

                <tr>
                    <th class='t1'>标题</th>
                    <th>回答</th>
                    <th class='t3'>更新时间</th>
                </tr>

                <tr>
                    <td class='t1'>
                        <a href="">什么牌子的电脑好</a><span>[电脑/硬件]</span>
                    </td>
                    <td>20</td>
                    <td class='t3'>1900.1.1</td>
                </tr>

            </table>
        </div>
    </div>
</div>
<!--------------------中部结束-------------------->

<!--------------------底部-------------------->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
