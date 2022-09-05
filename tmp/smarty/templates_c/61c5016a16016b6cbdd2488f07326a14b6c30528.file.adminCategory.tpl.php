<?php /* Smarty version Smarty-3.1.6, created on 2021-02-01 12:12:09
         compiled from "../views/admin\adminCategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208826017e209447442-55408645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c5016a16016b6cbdd2488f07326a14b6c30528' => 
    array (
      0 => '../views/admin\\adminCategory.tpl',
      1 => 1611827483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208826017e209447442-55408645',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'rsMainCategories' => 0,
    'mainItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_6017e20961eb3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6017e20961eb3')) {function content_6017e20961eb3($_smarty_tpl) {?><h2>Категории</h2>
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>№</th>
			<th>ID</th>
			<th>Название</th>
			<th>Родительская категория</th>
			<th>Действие</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['itereration'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
				<td>
					<input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
				</td>
				<td>
					<select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<option option="0"> Главная категория
							<?php  $_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mainItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->key => $_smarty_tpl->tpl_vars['mainItem']->value){
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']==$_smarty_tpl->tpl_vars['mainItem']->value['id']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>
</option>
							<?php } ?>
					</select>
				</td>
				<td>
					<input type="button" value="Сохранить" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
				</td>
			</tr>
		<?php } ?>
	</table><?php }} ?>