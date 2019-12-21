<?php
/* Smarty version 3.1.33, created on 2019-09-03 15:26:19
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\admin\view\index\add.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6e159b9519e4_83555255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '618fa95a4855aa33c7adf06524f5721d2c45cf85' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\admin\\view\\index\\add.html',
      1 => 1567495575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6e159b9519e4_83555255 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" >
    <p>商品名称<input name="goods_name" value="" type="text" ></p>
    <p>商品分类
        <select name="cate_id" >
            <option value="0" >所属分类</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cate']->value, 'vo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['vo']->value['cate_name'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    </p>
    <p>商品价格<input name="goods_price" value="" type="text" ></p>
    <p>商品图片<input name="goods_img" value="" type="file" ></p>
    <?php echo token();?>

    <input type="submit" value="添加">
</form>
</body>
</html><?php }
}
