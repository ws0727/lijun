<?php
/* Smarty version 3.1.33, created on 2019-10-02 12:57:29
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\ask\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d942e396f64d9_96134094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dbb6eaf034ab089c5fc9d07e2e0825595165df2' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\ask\\show.html',
      1 => 1569992248,
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
function content_5d942e396f64d9_96134094 (Smarty_Internal_Template $_smarty_tpl) {
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
home/css/question.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
home/js/question.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function(){
			//找到对象
			$("#anw_sub").click(function(){
                //找到输入框对象.失去焦点自动触发
				$("textarea[name='content']").trigger("blur");
				//取值
				//接内容去除两边空格
				var content=$("textarea[name='content']").val().trim();
				//接隐藏域里的id值
				var ask_id=$("input[name='qid']").val();
				//发ajax
				$.ajax({
					type:"post",
					url:"<?php echo url('Ask/add');?>
",
					data:{
						content:content,
						ask_id:ask_id
					},
					dataType:"json",     //转成json格式
					//监听
					success:function(data){
						if(data.status==1){
							location.href="";
						}
					},
					error:function(data){
						if(data.status==0){
							alert("网络错误");
						}
					}
				})
			});



//采纳
		$(".adopt-btn").click(function(){
			var answer_id=parseInt($("input[name='answer_id']").val());
			$.ajax({
				type:"post",
				url:"<?php echo url('Ask/accept');?>
",
				data:{
					answer_id:answer_id
				},
				dataType:"json",     //转成json格式
				//监听
				success:function(data){
					if(data.status==1){
						location.href="";
					}else{
						alert("采纳失败");
					}
				},
				error:function(data){
					if(data.status==0){
						alert("网络错误");
					}
				}
			});
		   });





//分页
//		$(".page").click(function(){
//			//接值
//			var pagenow=parseInt($(this).parent().attr("pagenow"));
//			var pagesum=parseInt($(this).parent().attr("pagesum"));
//			var ask_id=$(this).html();
//
//			$obj=$(this);
//			if($(this).is(".first")){    //如果first p=1
//				var p=1;
//			}
//			if($(this).is(".prev")){     //如果prev p=pagenow-1
//				var p=pagenow-1;
//			}
//			if($(this).is(".next")){     //如果next p=pagenow+1
//				var p=pagenow+1;
//			}
//			if($(this).is(".last")){     //如果last p=pagesum
//				var p=pagesum;
//			}
//			if(p==0||p>pagesum) return false;    //如果p=0或者大于pagesum就false
//			$.ajax({
//				type:"get",
//				url:"<?php echo url('Ask/page');?>
",
//				data:{
//					ask_id:ask_id,
//					p:p
//				},
//				success:function(data){
//					if(data.status==1){
//						var html="";
//						var date = new Date(v.answer_time * 1000);
//						Y = date.getFullYear() + '-';
//						M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
//						D = date.getDate() + ' ';
//						var answer_time = Y+M+D;
//						$.each(data.content,function(k,v) {
//							html+='<ul><li><div class="face">';
//							html+='<a href="">';
//							html+='<img src="'+ v.user_face+'" width="48" height="48">';
//							html+='</a></div><div class="cons blue">';
//							html+='<p>'+ v.ask_content+'！<span style="color:#888;font-size:12px">&nbsp;&nbsp;('+ answer_time+')</span></p>';
//							html+='</div></li></ul>';
//
//						});
//					}
//				},
//				error:function(data){
//					if(data.status==0){
//
//					}
//				}
//			});
//		});



	});
	<?php echo '</script'; ?>
>
</head>
<body>
	<!-- top -->
	<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--背景遮罩--><div id='background' class='hidden'></div>
<!-- top 结束-->
	<div id='location'>
		<a href="">全部分类</a>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadNav']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
		>&nbsp;<a href=""><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</a>&nbsp;&nbsp;
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>

<!--------------------中部-------------------->
	<div id='center-wrap'>
		<div id='center'>
			<div id='left'>
				<div id='answer-info'>
					<!-- 如果没有解决用wait -->
					<?php if ($_smarty_tpl->tpl_vars['ask1']->value['ask_status'] == 0) {?>
					<div class='ans-state wait'></div>
					<?php } else { ?>
					<div class='ans-state'></div>
					<?php }?>



					<div class='answer'>
						<p class='ans-title'><?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_content'];?>

							<b class='point'><?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_gold'];?>
</b>
						</p>
					</div>
					<ul>
						<li><a href=""><?php echo $_smarty_tpl->tpl_vars['ask1']->value['user_name'];?>
</a></li>
						<li><i class='level <?php echo level($_smarty_tpl->tpl_vars['ask1']->value['user_exp']);?>
' title='<?php echo level($_smarty_tpl->tpl_vars['ask1']->value['user_exp']);?>
'></i></li>
						<li><?php echo date('m-d H',$_smarty_tpl->tpl_vars['ask1']->value['ask_time']);?>
</li>
					</ul>
					<?php if (isset($_SESSION['user'])) {?>
					<div class='ianswer'>
						<form action="" method='POST'>
							<p>我来回答</p>
							<textarea name="content"></textarea>
							<input type="hidden" name='qid' value='<?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_id'];?>
'>
							<input type="botton" value='提交回答' id='anw_sub'/>
						</form>
					</div>
					<?php }?>
					<!-- 满意回答 -->
					<?php if ($_smarty_tpl->tpl_vars['answer1']->value['answer_status'] == 0) {?>

					<div class='ans-right'>
						<p class='title'><i></i>满意回答<span></span></p>
						<p class='ans-cons'><?php echo $_smarty_tpl->tpl_vars['answer1']->value['answer_content'];?>
！</p>
						<dl>
							<dt>
								<a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['answer1']->value['user_face'];?>
" width='48' height='48'/></a>
							</dt>
							<dd>
								<a href=""><?php echo $_smarty_tpl->tpl_vars['answer1']->value['user_name'];?>
</a>
							</dd>
							<dd><i class='level <?php echo level($_smarty_tpl->tpl_vars['ask1']->value['user_exp']);?>
'></i></dd>
							<dd><?php echo $_smarty_tpl->tpl_vars['userinfo1']->value['user_accept_num'];?>
</dd>
						</dl>
					</div>

					<?php }?>
					<!-- 满意回答 -->
				</div>



				<div id='all-answer'>
					<div class='ans-icon'></div>
					<p class='title'>共 <strong><?php echo $_smarty_tpl->tpl_vars['count1']->value;?>
</strong> 条回答</p>
					<!--回答开始-->
					<ul>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['answer']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
						<li>
							<div class='face'>
								<a href="">
									<img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_face'];?>
" width='48' height='48'/>
								</a>
							</div>
							<div class='cons blue'>
								<p><?php echo $_smarty_tpl->tpl_vars['vo']->value['answer_content'];?>
！<span style='color:#888;font-size:12px'>&nbsp;&nbsp;(<?php echo date('Y-d-m',$_smarty_tpl->tpl_vars['vo']->value['answer_time']);?>
)</span></p>
							</div>
							<?php if (isset($_SESSION['user'])) {?>
							<?php if ($_SESSION['user']['user_id'] == $_smarty_tpl->tpl_vars['ask1']->value['user_id']) {?>
							<?php if ($_smarty_tpl->tpl_vars['vo']->value['answer_status'] == 0) {?>
								<a  class='adopt-btn'>采纳</a>
							    <input type="hidden" name='answer_id' value='<?php echo $_smarty_tpl->tpl_vars['vo']->value['answer_id'];?>
'>

							<?php }?>
							<?php }?>
							<?php }?>
						</li>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</ul>
					<!--回答结束-->
					<!--分页开始-->
					<div class="page" pagenow="1" pagesum="" ask_id="<?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_id'];?>
">
						<a class="first" href="javascript:void(0)">首页</a>
						<a class="prev" href="javascript:void(0)">上一页</a>
						<a class="next" href="javascript:void(0)">下一页</a>
						<a class="last" href="javascript:void(0)">尾页</a>
					</div>
					<!--分页结束-->
				</div>



				<div id='other-ask'>
					<p class='title'>待解决的相关问题</p>
					<table>
						<tr>
							<td class='t1'><a href=""><?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_content'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['ask1']->value['ask_answer_num'];?>
&nbsp;回答</td>
							<td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['ask1']->value['ask_time']);?>
</td>
						</tr>
					</table>
				</div>
			</div>
		<!-- 右侧 -->
			<?php $_smarty_tpl->_subTemplateRender('file:public/right.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- ---右侧结束---- -->
		</div>
	</div>
<!--------------------中部结束-------------------->

<!-- 底部 -->
	<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
