<?php
/* Smarty version 3.1.33, created on 2019-09-22 16:57:07
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\public\left.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8737636e2d58_44166169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfb9b043d741b5990dedef7a34233f2e4fa7bbc9' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\public\\left.html',
      1 => 1569142626,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8737636e2d58_44166169 (Smarty_Internal_Template $_smarty_tpl) {
?><div id='left'>
    <div class='userinfo'>
        <dl>

            <dt>
                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_face'];?>
" width='48' height='48' alt="占位符"/></a>
            </dt>

            <dd class='username'>
                <a href=""><b>后盾网</b>
                </a>
                <a href="">
                    <i class='level lv1' title='Level 1'></i>
                </a>
            </dd>

            <dd>金币：<a href="" style="color: #888888;"><b class='point'><?php echo $_smarty_tpl->tpl_vars['user']->value['user_gold'];?>
</b></a></dd>
            <dd>经验值：<?php echo $_smarty_tpl->tpl_vars['user']->value['user_exp'];?>
</dd>

        </dl>
        <table>
            <tr>
                <td>回答数</td>
                <td>采纳率</td>
                <td class='last'>提问数</td>
            </tr>
            <tr>
                <td><a href=""><?php echo $_smarty_tpl->tpl_vars['user']->value['user_answer_num'];?>
</a></td>
                <td><a href=""><?php echo $_smarty_tpl->tpl_vars['user']->value['user_accept_num'];?>
</a></td>
                <td class='last'><a href=""><?php echo $_smarty_tpl->tpl_vars['user']->value['user_ask_num'];?>
</a></td>
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
            <a href="<?php echo url('User/face');?>
">上传头像</a>
        </li>

        <li style="background:none"></li>
    </ul>
</div><?php }
}
