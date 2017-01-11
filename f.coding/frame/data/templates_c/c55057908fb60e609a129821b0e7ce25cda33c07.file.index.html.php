<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-04 16:31:47
         compiled from "G:\yangxiangming\development.version.code\frame\templates\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2368254d1ceacc147d0-48423626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c55057908fb60e609a129821b0e7ce25cda33c07' => 
    array (
      0 => 'G:\\yangxiangming\\development.version.code\\frame\\templates\\index.html',
      1 => 1423038498,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2368254d1ceacc147d0-48423626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54d1ceacc435e5_86929215',
  'variables' => 
  array (
    'betanotice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d1ceacc435e5_86929215')) {function content_54d1ceacc435e5_86929215($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to Code</title>
<?php echo '<script'; ?>
 src="files/style/js/dynamic.min.js"><?php echo '</script'; ?>
>
<style type="text/css">
body{
  padding: 10px;
  text-align: center;
  font: italic 13px/1.2em Georgia, serif;
  color: #3aa509;
}
span {
  text-align: center;
  text-transform: uppercase;
  font-size: 3em;
  letter-spacing: 0.1em;
  color: #3aa509;
  animation: rotate 2s ease-in-out alternate infinite;
  font: italic 13px/1.2em Georgia, serif;
}
span:before {
  content: attr(data-shadow);
  color: transparent;
  text-shadow: 0 0 15px #FFF;
  position: absolute;
  z-index: -1;
  margin: -0.1em 0 0 0;
  animation: skew 2s ease-in-out alternate infinite;
  transform-origin: bottom;
}
@keyframes rotate {
  from {
    transform: rotateY(-10deg);
    text-shadow:  1px -1px #CCC, 2px -1px #BBB, 3px -2px #AAA, 4px -2px #999, 5px -3px #888, 6px -3px #777;
  }
  to {
    transform: rotateY(10deg);
    text-shadow:  -1px -1px #CCC, -2px -1px #BBB, -3px -2px #AAA, -4px -2px #999, -5px -3px #888, -6px -3px #777;
  }
}
@keyframes skew {
  from {
    transform: scaleY(0.3) skewX(-15deg);
  }
  to {
    transform: scaleY(0.3) skewX(-20deg);
  }
}
.left-nbsp {
  margin-left: -165px;
}
</style>
</head>
<body>
Welcome to &nbsp;<?php echo $_smarty_tpl->tpl_vars['betanotice']->value;?>

<p>温馨提示：目前 Core Code 处于Beta阶段中，更多精彩，敬请期待……</p>
<p class="left-nbsp">Contact me：yangxiangming@live.com</p>
</body>
</html><?php }} ?>
