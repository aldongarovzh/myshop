<?php /* Smarty version Smarty-3.1.6, created on 2021-04-29 18:52:42
         compiled from "../views/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:475710424608ae45ab380d1-87926281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dbdba5b3e744fb99042215648705161ce6110d6' => 
    array (
      0 => '../views/default/header.tpl',
      1 => 1610947184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '475710424608ae45ab380d1-87926281',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'teplateWebPath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608ae45ab8a42',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608ae45ab8a42')) {function content_608ae45ab8a42($_smarty_tpl) {?><html>
	<head>
		<title> <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
 </title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['teplateWebPath']->value;?>
css/main.css" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="/js/main.js"></script>
	</head>


<body>


	<div id="header">

		<h1> myshop - интернет магазин </h1>

	</div>


<?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<div id="centerColumn">

<?php }} ?>