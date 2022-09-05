<?php 
/**
*	Модель для таблицы заказов (orders)
*
*
*
*/

/**
*	Создание заказа (без привязки товара)
*
*	@param string $name
*	@param string $phone
*	@param string $adress
*	@return integer ID созданного заказа
*/
function makeNewOrder($db, $name, $phone, $adress){
	//> иницилизация переменных
	$userId = $_SESSION['user']['id'];
	$comment = "id пользователя: {$userId} <br />
				Имя: {$name} <br />
				Тел: {$phone} <br />
				Адрес: {$adress} <br />";
	$dateCreated = date('Y.m.d H:i:s');
	$userIp = $_SERVER['REMOTE_ADDR'];
	//<

	// Формирование запроса к БД
	$sql = "INSERT INTO
			orders (`user_id`, `date_created`, `date_payment`,
					`status`, `comment`, `user_ip`)
			VALUES ('{$userId}', '{$dateCreated}', null,
					'0', '{$comment}', '{$userIp}')";
	$rs = mysqli_query($db, $sql);

	// Получить id созданного заказа
	if($rs){
		$sql = "SELECT id
				FROM orders
				ORDER BY id DESC
				LIMIT 1
		";

		$rs = mysqli_query($db, $sql);
		$rs = createSmartyRsArray($db, $rs);

		// возвращаем id созданного запроса
		if(isset($rs[0])){
			return $rs[0]['id'];
		}
	}

	return false;



}


/**
*	Получить список заказ с привязкой к продуктам для пользователя $userId
*
*	@param integer $userId ID пользователя
*	@return array массив заказов с привязкой к продуктам
*/
function getOrdersWithProductsByUser($db, $userId){
	$userId = intval($userId);
	$sql = "SELECT * FROM orders
			WHERE `user_id` = '{$userId}'
			ORDER BY id DESC
	";

	$rs = mysqli_query($db, $sql);
	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){
		$rsChildren = getPurchaseForOrder($row['id']);

		if($rsChildren){
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}


function getOrders($db){ //o.* - select orders.* u.name = user.name
	$sql = "SELECT o.*, u.name, u.email, u.phone, u.adress
			FROM orders AS `o`
			LEFT JOIN users AS `u` ON o.user_id = u.id
			ORDER BY id DESC
	";

	$rs = mysqli_query($db, $sql);
	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){
		$rsChildren = getProductsForOrder($row['id']);

		if($rsChildren){
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}


/**
*	Получить продукты заказа
*
*	@param integer $orderId ID заказа
*	@return array массив данных продуктов
*
*/
function getProductsForOrder($db, $orderId){
	$sql = "SELECT *
			FROM purchase AS pe
			LEFT JOIN products AS ps
				ON pe.product_id = ps.id
			WHERE (`order_id` = '{$orderId}')
	";

	$rs = mysqli_query($db, $sql);
	return createSmartyRsArray($db, $rs);
}

function updateOrderStatus($db, $itemId, $status){
	$status = intval($status);

	$sql = "UPDATE orders
			SET `status` = '{$status}'
			WHERE id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);
	return $rs;
}


function updateOrderDatePayment($db, $itemId, $datePayment){
	$sql = "UPDATE orders
			SET `date_payment` = '{$datePayment}'
			WHERE id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);

	return $rs;
}