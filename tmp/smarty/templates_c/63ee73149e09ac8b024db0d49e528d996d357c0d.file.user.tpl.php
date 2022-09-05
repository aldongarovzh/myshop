<?php /* Smarty version Smarty-3.1.6, created on 2021-01-22 09:43:04
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22136600a90187636f7-38174253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1611304944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22136600a90187636f7-38174253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_600a90187e12a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_600a90187e12a')) {function content_600a90187e12a($_smarty_tpl) {?>

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
</table><?php }} ?>