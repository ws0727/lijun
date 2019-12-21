<?php
/* Smarty version 3.1.33, created on 2019-09-25 09:24:35
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\ask\ask.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8ac1d325b345_76334773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cbb39e5bcaaef016630efa8e8a04844726f2d37' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\ask\\ask.html',
      1 => 1569340173,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5d8ac1d325b345_76334773 (Smarty_Internal_Template $_smarty_tpl) {
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
home/css/ask.css" />
	<?php echo '<script'; ?>
>
		//判断如果没有$user(没有登录)就为false/true
		<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
		var login=true;
		<?php } else { ?>
		var login=false;
		<?php }?>

        $(function(){
			$("select[name='ask_gold'] option").each(function(){
				var my_gold=parseInt($(".my_gold").html());
				//如果ask_gold里的金额大于my_gold我的金额就disabled禁用
				if($(this).val() > my_gold){
					$(this).prop("disabled",true);
				}
			});
			$(document).on("click","select[name=cate_id] option",function(){
				var cate_id=$(this).val();
				var obj=$(this);
				$(this).parent().nextAll().remove();
				$.ajax({
					type:"post",
					url:"<?php echo url('getCate');?>
",
					data:{
                       cate_id:cate_id
					},
					dataType:"json",
					success:function(data){
                      if(data.status==1){
						 var html="";
						  html+='<select name="cate_id" size="16">';
						  $.each(data.content,function(k,v){
							  html+='<option value='+ v.cate_id+'>'+ v.cate_name+'</option>';
						  });
						  html+='</select>';
						  obj.parent().after(html);
					  }
					}
				})
			});
		   //找到登录class事件点击如果login==false就自动触发login
			$(".send-btn").click(function(){
				if(login==false){
					$(".login").trigger("click")
					return false;
				}
			});
			$("#ok").click(function(){
              var cate_id=$("select[name='cate_id']").last().val();
				alert(cate_id);
				$("input[name='cate_id']").val(cate_id);
				$(".close-window").trigger("click");
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
	<div id='location'>
		<a href="">后盾问答</a>&nbsp;>&nbsp;提问
	</div>
<!--------------------中部-------------------->
	<div id='center'>
		<div class='send'>
			<div class='title'>
				<p class='left'>向亿万网友们提问</p>
				<p class='right'>您还可以输入<span id='num'>50</span>个字</p>
			</div>
			<form action="" method='post'>
				<div class='cons'>
					<textarea name="ask_content"></textarea>
				</div>
				<div class='reward'>

					<span id='sel-cate' class='cate-btn'>选择分类</span>
					<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
					<ul>
						<li>
							我的金币：<span class="my_gold"><?php echo $_smarty_tpl->tpl_vars['user']->value['user_gold'];?>
</span>
						</li>
						<li>
					  悬赏：<select name="ask_gold">
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="50">50</option>
								<option value="80">80</option>
								<option value="100">100</option>
							</select>金币
						</li>
					</ul>
					<?php }?>
				</div>

				<input type='hidden' name='cate_id' value='0'/>
				<input type="submit" value='提交问题' class='send-btn'/>
			</form>
		</div>
	</div>
	<div id='category'>
		<p class='title'>
			<span>请选择分类</span>
			<a href="" class='close-window'></a>
		</p>
		<div class='sel'>
			<p>为您的问题选择一个合适的分类：</p>
			<select name="cate_id" size='16'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topCate']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>

		</div>
		<p class='bottom' >
			<span id='ok'>确定</span>
		</p>
	</div>
<!--------------------中部结束-------------------->

<!-- 底部 -->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
