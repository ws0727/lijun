<?php
/* Smarty version 3.1.33, created on 2019-10-13 16:28:27
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\admin\view\user\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5da2e02b7d3d65_10744035',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b36b618db65556ea53733088b86af012cdcff4c' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\admin\\view\\user\\index.html',
      1 => 1570954994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5da2e02b7d3d65_10744035 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo resource();?>
admin/css/public.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo resource();?>
admin/layer/layer.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		$(function(){
			$(document).on("click",".user_detail",function(){
				var user_exp=$(this).attr("user_exp");
				var user_gold=$(this).attr("user_gold");
				html="";
				html="<p>经验:"+user_exp+"</p>";
				html+="<p>金币:"+user_gold+"</p>";
				layer.open({
					type:1,
					skin:'layui-layer-rim', //加边框
                    area:['420px','240px'],  //宽高
					content:html
				})
			});

//修改状态
			$(document).on("click",".user_status",function(){
				var status=$(this).attr("status");
				var user_id=$(this).parents("tr").attr("user_id");
				var user_status=$(this).attr("user_status");
				var obj=$(this);
				if(status==0){
					$(this).attr("status",1);
					$.ajax({
						type:"post",
						url:"<?php echo url('updateStatus');?>
",
						data:{
							user_id:user_id,
							user_status:user_status
						},
						dataType:"json",
						success:function(data){
							if(data.status==1){
								obj.attr("status",0);
								if(user_status==0){
									obj.attr("user_status",1);
									obj.html("禁用");
								}else{
									obj.html("正常");
									obj.attr("user_status",0)
								}
							}else{
								alert("修改失败");
							}
						}
					});
				}
			});



//搜索
			$("#search").click(function(){
				$.post("<?php echo url('search');?>
",{
					user_phone:$("input[name='user_phone']").val().trim(),
					user_email:$("input[name='user_email']").val().trim(),
					user_status:$("select[name='user_status']").val(),
					p:1
				},function(data){
                  if(data.status==1){
					  var html="";
					  $.each(data.content,function(k,v){
						  html+='<tr user_id="'+v.user_id+'">';
						  html+=' <td>'+ v.user_id+'</td>';
						  html+='<td><span class="user_name">'+ v.user_name+'</span></td>';
						  if(v.user_email==null){
							  html+='<td></td>';
						  }else{
							  html+='<td>'+ v.user_email+'</td>';
						  }
						  html+='<td>'+ v.user_phone+'</td>';
						  html+='<td>';
						  if(v.user_status==1){
						  html+='<span status="0" class="user_status" user_status="1">禁用</span>';
						  }else{
							  html+='<span status="0" class="user_status" user_status="0">正常</span>';
						  }
						  html+='</td>';
						  html+='<td><a user_exp="'+ v.user_exp+'" user_gold="' + v.user_gold+'" class="user_detail" user_ask_num="'+ v.user_ask_num+'" href="javascript:void(0)">显示详情</a></td>';
						  html+=' <td> <a>删除</a> <a>修改</a> </td>';
						  html+='</tr>';
					  });
                       $("#user_content").html(html);
                       $(".page").attr("pagenow",1);
					   $(".page").attr("pagesum",data.pagesum);
					}else{
					  $(".page").attr("pagenow",1);
					  $(".page").attr("pagesum",0);
                       $("#user_content").html("<tr><td colspan='7'>"+data.msg+"</td></tr>>");
					}
				},"json");
			});



//分页
           $(".page a").click(function(){
            //解析。父级中。操作（pagenow）
           var pagenow=parseInt($(this).parent().attr("pagenow"));
		   var pagesum=parseInt($(this).parent().attr("pagesum"));
			   $obj=$(this);
			   if($(this).is(".first")){    //如果first p=1
				   var p=1;
			   }
			   if($(this).is(".prev")){     //如果prev p=pagenow-1
				   var p=pagenow-1;
			   }
			   if($(this).is(".next")){     //如果next p=pagenow+1
				   var p=pagenow+1;
			   }
			   if($(this).is(".last")){     //如果last p=pagesum
                   var p=pagesum;
			   }
               if(p==0||p>pagesum) return false;    //如果p=0或者大于pagesum
			   $.get("<?php echo url('page');?>
",{             //地址
                   p:p,                              //传的内容
				   //接值
				   user_phone:$("input[name='user_phone']").val().trim(),
				   user_email:$("input[name='user_email']").val().trim(),
				   user_status:$("select[name='user_status']").val()
			   },function(data){
                 if(data.status==1){
					 var html="";
					 $.each(data.content,function(k,v){
						 html+='<tr user_id="'+v.user_id+'">';
						 html+=' <td>'+ v.user_id+'</td>';
						 html+='<td><span class="user_name">'+ v.user_name+'</span></td>';
						 if(v.user_email==null){
							 html+='<td></td>';
						 }else{
							 html+='<td>'+ v.user_email+'</td>';
						 }
						 html+='<td>'+ v.user_phone+'</td>';
						 html+='<td>';


						 if(v.user_status==1){
							 html+='<span status="0" class="user_status" user_status="1">禁用</span>';
						 }else{
							 html+='<span status="0" class="user_status" user_status="0">正常</span>';
						 }
						 html+='</td>';
						 html+='<td><a user_exp="'+ v.user_exp+'" user_gold="' + v.user_gold+'" class="user_detail" user_ask_num="'+ v.user_ask_num+'" href="javascript:void(0)">显示详情</a></td>';
						 html+=' <td> <a>删除</a> <a>修改</a> </td>';
						 html+='';
						 html+='</tr>';
					 });
					 $("#user_content").html(html);
					 obj.parent().attr("pagenow",p);

				 }else{
					 alert("没有取到数据");
				 }
			   },"json");
		   });


		});
	<?php echo '</script'; ?>
>
</head>
<body>
<input name="user_phone" placeholder="手机号"/>
<input name="user_email" placeholder="邮箱号"/>
<select name="user_status">
	<option value="-1">全部</option>
	<option value="1">禁用</option>
	<option value="0">正常</option>
</select>
<button id="search">搜索</button>

	<table class="table">
		<thead>
		<tr>
			<td class="th" colspan="20">用户列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>用户名称</td>
			<td>用户手机</td>
			<td>用户邮箱</td>
			<td>用户状态</td>
			<td>帐号详情</td>
			<td>操作</td>
		</tr>
		</thead>
		<tbody id="user_content">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
		<tr user_id="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_id'];?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_phone'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['user_email'];?>
</td>
			<td>
				<span class="user_status" user_status="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_status'];?>
" status="0">
			    <?php if ($_smarty_tpl->tpl_vars['vo']->value['user_status'] == 1) {?>
				禁用
				<?php } else { ?>
				正常
			    <?php }?>
				</span>

			</td>
			<td>
				<a user_exp="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_exp'];?>
" user_gold="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_gold'];?>
" class="user_detail" user_ask_num="<?php echo $_smarty_tpl->tpl_vars['vo']->value['user_ask_num'];?>
" href="javascript:void(0)">显示详情</a>
			</td>
			<td>
				<a>删除</a>
				<a>修改</a>
			</td>
		</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</tbody>
	</table>

    <div class="page" pagenow="1" pagesum="<?php echo $_smarty_tpl->tpl_vars['pagesum']->value;?>
">
		<a class="first" href="javascript:void(0)">首页</a>
		<a class="prev" href="javascript:void(0)">上一页</a>
		<a class="next" href="javascript:void(0)">下一页</a>
		<a class="last" href="javascript:void(0)">尾页</a>
	</div>
</body>
</html><?php }
}
