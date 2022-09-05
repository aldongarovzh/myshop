<?php /* Smarty version Smarty-3.1.6, created on 2021-01-27 07:51:37
         compiled from "../views/admin\adminHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14020601109392547f2-92823392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f57e82fa5ed0880e976fb6af9573ee08cc54de83' => 
    array (
      0 => '../views/admin\\adminHeader.tpl',
      1 => 1611730295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14020601109392547f2-92823392',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_6011093937c76',
  'variables' => 
  array (
    'pageTitle' => 0,
    'teplateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6011093937c76')) {function content_6011093937c76($_smarty_tpl) {?> 
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
			<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/main.css" type="text/css"/>
			<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
js/admin.js"></script>
	</head>

	<body>

		<div id="header">
			<h1>Управление сайтом</h1>
		</div>
<?php echo $_smarty_tpl->getSubTemplate ('adminLeftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="centerColumn"><?php }} ?>