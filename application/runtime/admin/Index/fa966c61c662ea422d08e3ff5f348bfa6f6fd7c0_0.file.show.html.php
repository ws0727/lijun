<?php
/* Smarty version 3.1.33, created on 2019-09-03 09:15:34
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\admin\view\index\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6dbeb679d8b4_59829044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa966c61c662ea422d08e3ff5f348bfa6f6fd7c0' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\admin\\view\\index\\show.html',
      1 => 1567473309,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6dbeb679d8b4_59829044 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>展示页</title>
    <style>
        .pagination li{
            display: inline-block;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div><a style="font-size: 20px;" href="<?php echo url('add');?>
">添加</a></div>
<form>
    <input type="text" name="goods_name" value="" >
    <select name="cate_id">
        <option value="0" >全部</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods']->value, 'vo');
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
    <input type="submit" value="搜索" >
</form>

<table border="1px">
    <tr>
        <td>id</td>
        <td>商品名称</td>
        <td>商品价格</td>
        <td>商品图片</td>
        <td>所属分类</td>
        <td>操作</td>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goods']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['goods_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['goods_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['goods_price'];?>
</td>
        <td><img width="100px" src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['goods_img'];?>
"></td>
        <td><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</td>
        <td>
            <a href="<?php echo url('delete',array('goods_id'=>$_smarty_tpl->tpl_vars['vo']->value['goods_id']));?>
" >删除</a>
            <a href="<?php echo url('update',array('goods_id'=>$_smarty_tpl->tpl_vars['vo']->value['goods_id']));?>
" >修改</a>
        </td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</body>
</html><?php }
}
