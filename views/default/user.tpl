{*	страница пользователя	*}

<h1> Ваши регистрационные данные: </h1>

<table border="0">
	<tr>
		<td> Логин (email) </td>
		<td> {$arUser['email']} </td>
	</tr>
	<tr>
		<td> Имя </td>
		<td> <input type="text" id="newName" value="{$arUser['name']}"/> </td>
	</td>
	<tr>
		<td> Тел </td>
		<td><input type="text" id="newPhone" value="{$arUser['phone']}" /> </td>
	</td>
	<tr>
		<td> Адрес </td>
		<td><textarea id="newAdress" /> {$arUser['adress']} </textarea> </td>
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
{if ! $rsUserOrders}
	Нет заказов
{else}
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
		{foreach $rsUserOrders as $item name=orders}
			<tr>
				<td>{$smarty.foreach.orders.iteration}</td>
				<td><a href="#" onclick="showProducts('{$item['id']}'); return false;">Показать товар заказа</a></td>
				<td>{$item['id']}</td>
				<td>{$item['status']}</td>
				<td>{$item['date_created']}</td>
				<td>{$item['date_payment']}&nbsp;</td>
				<td>{$item['comment']}</td>
			</tr>
			<tr class="hideme" id="purchasesForOrderId_{$item['id']}">
				<td colspan="7">
				{if $item['children']}
					<table border="1" cellpadding="1" cellspacing="1" width="100%">
						<tr>
							<td>№</td>
							<td>ID</td>
							<td>Название</td>
							<td>Цена</td>
							<td>Количество</td>
						</tr>
					{foreach $item['children'] as $itemChild name=products}
						<tr>
							<td>{$smarty.foreach.products.iteration}</td>
							<td>{$itemChild['product_id']}</td>
							<td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
							<td>{$itemChild['price']}</td>
							<td>{$itemChild['amount']}</td>
						</tr>
					{/foreach}
					</table>			
				{/if}	
				</td>
			</tr>
		{/foreach}
	</table>
{/if}