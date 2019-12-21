<?php
/* Smarty version 3.1.33, created on 2019-09-23 09:56:41
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\index\member.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8826595ec316_20107659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c03a578671f7934ca11363473f11b4aa9a9903a9' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\index\\member.html',
      1 => 1569199787,
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
function content_5d8826595ec316_20107659 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后盾问答</title>
	<meta name="keywords" content="后盾问答"/>
	<meta name="description" content="后盾问答"/>
	<link rel="stylesheet" href="<?php echo resource();?>
home/css/common.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/jquery-1.7.2.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/top-bar.js'><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo resource();?>
home/css/member.css"/>
	<?php echo '<script'; ?>
>

	<?php echo '</script'; ?>
>
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top结束 -->
<!--------------------中部-------------------->
<div id='center'>
<!-- 左侧 -->
	<!-- 左侧 -->
	<?php $_smarty_tpl->_subTemplateRender('file:public/left.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<!-- 左侧结束 -->
		<div id='right'>
	
			<p class='title'>我的首页</p>

			<ul class='property'>
				<li>金币：<span><?php echo $_smarty_tpl->tpl_vars['user']->value['user_gold'];?>
</span></li>
				<li>经验值：<span><?php echo $_smarty_tpl->tpl_vars['user']->value['user_exp'];?>
</span></li>
				<li>采纳率：<span><?php echo $_smarty_tpl->tpl_vars['user']->value['user_accept_num'];?>
</span></li>
			</ul>

			<div class='list'>
				<p><span>我的提问 <b>(共<?php echo $_smarty_tpl->tpl_vars['count1']->value;?>
条)</b></span><a href="">更多>></a></p>
				<table>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ask']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
						<tr height='140'>
							<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_content'];?>
</td>
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
							<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_answer_num'];?>
</td>
							<td class='t3'><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['vo']->value['ask_time']);?>
</td>
						</tr>
					 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</table>
			</div>
		</div>
	</div>
<!--------------------中部结束-------------------->

<!--------------------底部-------------------->
<!-- 底部 -->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
