<?php
/* Smarty version 3.1.33, created on 2019-10-29 08:10:14
  from 'D:\phpstudy\PHPTutorial\WWW\tp\application\home\view\index\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db7f3e683cff9_97581237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a77513f5930f7edeae3fc2ade740bb39badbc16e' => 
    array (
      0 => 'D:\\phpstudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\index\\index.html',
      1 => 1569246704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/right.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5db7f3e683cff9_97581237 (Smarty_Internal_Template $_smarty_tpl) {
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
home/css/index.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src='<?php echo resource();?>
home/js/index.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		$(function(){

		});
	<?php echo '</script'; ?>
>
</head>
<body>
     <!--引入头部-->
	<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>





	<div class='main'>
		<div id='left'>
			<p class='left-title'>所有问题分类</p>
			<ul class='left-list'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cate']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
				<li class='list-l1'>
					<div class='list-l1-wrap'>
						<!--<h4><a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</a></h4>-->
						<ul class='list-l2'>
							<li><a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</a></li>
						</ul>
					</div>

					<div class='list-more hidden'>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vo']->value['son'], 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
						<ul>
							<li><a href=""><?php echo $_smarty_tpl->tpl_vars['v']->value['cate_name'];?>
</a></li>
						</ul>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>

				</li>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		</div>




		<div id='center'>
			<div id='animate'>
				<div class='imgs-wrap'>
					<ul>
						<li>
							<a href=""><img src="<?php echo resource();?>
home/images/animate1.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo resource();?>
home/images/animate2.jpg" width='558' height='190'/></a>
						</li>
						<li>
							<a href=""><img src="<?php echo resource();?>
home/images/animate3.jpg" width='558' height='190'/></a>
						</li>
					</ul>
				</div>
				<ul class='ani-btn'>
					<li class='ani-btn-cur'>0学费学习<i></i></li>
					<li>超百G原创视频<i></i></li>
					<li style='border:none'>有实力做后盾<i></i></li>
				</ul>
			</div>

		<!--待解决问题开始	-->
			<dl class='answer-list'>
				<dt>
					<span class='wait-as'>待解决问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ask1']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
				<dd>
					<a href="<?php echo url('Ask/show',array('ask_id'=>$_smarty_tpl->tpl_vars['vo']->value['ask_id']));?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_content'];?>
</a>
					<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_answer_num'];?>
回答</span>
				</dd>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</dl>
			<!--待解决问题结束	-->
			<!--高分悬赏问题开始-->
			<dl class='answer-list'>
				<dt>
					<span class='reward-as'>高分悬赏问题</span>
					<a href=''>更多>></a>
				</dt>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ask2']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
				<dd>
					<a href=""><b><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_gold'];?>
</b><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_content'];?>
</a>
					<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['ask_answer_num'];?>
回答</span>
				</dd>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</dl>
			<!--高分悬赏问题结束-->

		</div>
		<!-- 右侧 -->
		<?php $_smarty_tpl->_subTemplateRender('file:public/right.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<!-- ---右侧结束---- -->
	</div>
<!--------------------内容主体结束-------------------->
	<div class='clear'></div>
<!--引入尾部-->
	 <?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
