<?php /* Smarty version Smarty-3.1.6, created on 2021-04-29 19:04:07
         compiled from "../views/default/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75599841608ae70756a061-29702710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e03be405d95652b2f22cc0b288652122179328d0' => 
    array (
      0 => '../views/default/product.tpl',
      1 => 1610704046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75599841608ae70756a061-29702710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608ae7075a523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608ae7075a523')) {function content_608ae7075a523($_smarty_tpl) {?>

<h3> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
 </h3>

<img width='575' src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">

Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a id="addToCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value){?> class="hideme" <?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину"> Добавить в корзину </a>
<a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value){?> class="hideme" <?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины"> Удалить из корзины </a>
<p> Описание: <br/> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
 </p>
<?php }} ?>