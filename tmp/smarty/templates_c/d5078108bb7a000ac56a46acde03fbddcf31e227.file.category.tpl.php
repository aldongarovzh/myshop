<?php /* Smarty version Smarty-3.1.6, created on 2021-04-29 18:53:03
         compiled from "../views/default/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1925929995608ae46fcda9b4-15956004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5078108bb7a000ac56a46acde03fbddcf31e227' => 
    array (
      0 => '../views/default/category.tpl',
      1 => 1609511376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1925929995608ae46fcda9b4-15956004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsCategory' => 0,
    'rsProducts' => 0,
    'item' => 0,
    'rsChildCats' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608ae46fd180f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608ae46fd180f')) {function content_608ae46fd180f($_smarty_tpl) {?>
<h1> Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
 </h1>

	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<div style="float: left; padding: 0px 30px 40px 0px;">
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
				<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" />
			</a> <br/>
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
	</a>
		</div>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%3==0){?>
			<div style="clear: both;">	</div>
		<?php }?>
	<?php } ?>

	
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<h2> <a href="?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 </a> </h2>
	<?php } ?>

<?php }} ?>