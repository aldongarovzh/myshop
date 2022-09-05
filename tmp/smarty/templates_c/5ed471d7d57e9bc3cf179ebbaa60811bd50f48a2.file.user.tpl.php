<?php /* Smarty version Smarty-3.1.6, created on 2021-06-21 06:11:31
         compiled from "../views/default/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56013692760d02d9394b5d6-87441035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ed471d7d57e9bc3cf179ebbaa60811bd50f48a2' => 
    array (
      0 => '../views/default/user.tpl',
      1 => 1611655672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56013692760d02d9394b5d6-87441035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arUser' => 0,
    'rsUserOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_60d02d93aa3d7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60d02d93aa3d7')) {function content_60d02d93aa3d7($_smarty_tpl) {?>

<h1> Ваши регистрационные данные: </h1>

<table border="0">
	<tr>
		<td> Логин (email) </td>
		<td> <?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
 </td>
	</tr>
	<tr>
		<td> Имя </td>
		<td> <input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/> </td>
	</td>
	<tr>
		<td> Тел </td>
		<td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" /> </td>
	</td>
	<tr>
		<td> Адрес </td>
		<td><textarea id="newAdress" /> <?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
 </textarea> </td>
	</td>
	<tr>
		<td> Новый пароль </td>
		<td> <input type="password" id="newPwd1" value="" /> </td>
	</td>
	<tr>
		<td> Повтор пароля </td>
		<td> <input type="password" id="newPwd2" value="" /> </td>
	</td>
	<tr>
		<td> Для того чтобы сохранить данные введите текущий пароль </td>
		<td> <input type="password" id="curPwd" value="" /></td>
	</td>
	<tr>
		<td> &nbsp; </td>
		<td> <input type="button" value="Сохранить изменения" onClick="updateUserData();" /> </td>
	</td>
</table>

<h2>Заказы:</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value){?>
	Нет заказов
<?php }else{ ?>
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>№</th>
			<th>Действие</th>
			<th>ID заказа</th>
			<th>Статус</th>
			<th>Дата создания</th>
			<th>Дата оплаты</th>
			<th>Дополнительная информация</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
			<tr>
				<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
				<td><a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показать товар заказа</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
&nbsp;</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
			</tr>
			<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<td colspan="7">
				<?php if ($_smarty_tpl->tpl_vars['item']->value['children']){?>
					<table border="1" cellpadding="1" cellspacing="1" width="100%">
						<tr>
							<td>№</td>
							<td>ID</td>
							<td>Название</td>
							<td>Цена</td>
							<td>Количество</td>
						</tr>
					<?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value){
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
						<tr>
							<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
							<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
						</tr>
					<?php } ?>
					</table>			
				<?php }?>	
				</td>
			</tr>
		<?php } ?>
	</table>
<?php }?><?php }} ?>