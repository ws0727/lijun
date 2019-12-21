<?php
/* Smarty version 3.1.33, created on 2019-09-24 19:50:54
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\public\right.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8a031e8adab8_35163666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '960bf64dd16aa0e0155510271a699b05748004a0' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\public\\right.html',
      1 => 1569325850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8a031e8adab8_35163666 (Smarty_Internal_Template $_smarty_tpl) {
?><div id='right'>
    <!--个人信息开始-->
    <?php if (isset($_SESSION['user'])) {?>
    <div class='userinfo'>
        <dl>
            <dt>
                <a href="<?php echo url('Index/member');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_face'];?>
" width='48' height='48' alt="占位符"/></a>
            </dt>
            <dd class='username'>
                <a href="">
                    <b></b>
                </a>
                <a href="">
                    <i class='level lv1' title='Level 1'></i>
                </a>
            </dd>
            <dd>金币：<a href="" style="color: #888888;"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_gold'];?>
<b class='point'></b></a></dd>
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

        <ul>
            <li><a href="">我提问的</a></li>
            <li><a href="<?php echo url('Index/member');?>
">我回答的</a></li>
        </ul>
    </div>
    <?php }?>
    <div class='clear'></div>
    <!--个人信息结束-->

    <!--后盾问答之星开始-->
    <div class='star'>
        <p class='title'>后盾问答之星</p>
        <span class='star-name'>本日回答问题最多的人</span>
        <div class='star-info'>
            <div>

                <a href="" class='star-face'>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['userinfo1']->value['user_face'];?>
" width='48px' height='48px' alt="头像站位"
                </a>
                <ul>
                    <li><a href="">后盾网</a></li>
                    <i class='level lv1' title='Level 1'></i>
                </ul>
            </div>
            <ul class='star-count'>
                <li>回答数：<span><?php echo $_smarty_tpl->tpl_vars['userinfo1']->value['user_answer_num'];?>
</span></li>
                <li>采纳率：<span><?php echo $_smarty_tpl->tpl_vars['userinfo1']->value['user_accept_num'];?>
</span></li>
            </ul>
        </div>
    </div>
    <!--后盾问答之星结束-->

    <!--后盾问答助人光荣榜开始-->
    <div class='star-list'>
        <p class='title'>后盾问答助人光荣榜</p>
        <div>
            <ul class='ul-title'>
                <li>用户名</li>
                <li style='text-align:right;'>帮助过的人数</li>
            </ul>
            <ul class='ul-list'>
                <li>
                    <a href=""><i class='rank r1'></i><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[0]['user_name'];?>
</a>
                    <span><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[0]['user_answer_num'];?>
</span>
                </li>
                <li>
                    <a href=""><i class='rank r2'></i><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[1]['user_name'];?>
</a>
                    <span><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[1]['user_answer_num'];?>
</span>
                </li>
                <li>
                    <a href=""><i class='rank r3'></i><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[2]['user_name'];?>
</a>
                    <span><?php echo $_smarty_tpl->tpl_vars['userinfo2']->value[2]['user_answer_num'];?>
</span>
                </li>
            </ul>
        </div>
    </div>
    <!--后盾问答助人光荣榜结束-->
</div><?php }
}
