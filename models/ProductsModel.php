<?php

/**
* Модель для таблицы продукции (товаров) для отображения в центре страницы
*
*
*
*/



/**
* Получаем послдение добавленные товары
*
* @param integer $limit Лимит товаров
* @return array Массив товаров
*/
function getLastProducts_($db, $limit = null){

	$sql = "SELECT *
			FROM products
			ORDER BY id DESC
	";
	if($limit){
		$sql .= " LIMIT {$limit}";
	}
	$rs = mysqli_query($db, $sql);


	return createSmartyRsArray($db, $rs); //в maiFunctions.php создали функцию эту чтобы было удобно пользоваться данными в массиве для смарти
}

function getLastProducts($db, $offset = 1, $limit = 9){

	$sqlCnt = "SELECT count(id) as cnt
				FROM `products`
	";
	$rs = mysqli_query($db, $sqlCnt);
	$cnt = createSmartyRsArray($db, $rs);

	$sql = "SELECT *
			FROM `products`
			ORDER BY id DESC
	";
	$sql .= "LIMIT {$offset}, {$limit}";

	$rs = mysqli_query($db, $sql);
	$rows = createSmartyRsArray($db, $rs);

	return array($rows, $cnt[0]['cnt']);
}





/**
* Получить продукты для категории $itemId
*
* @param integer $itemId ID категории
* @return array массив продуктов
*
*/
function getProductsByCat($db, $itemId){

	$itemId = intval($itemId);
	$sql = "SELECT *
			FROM products
			WHERE category_id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($db, $rs);
	
}



/* своя пробная функция
function getProductById($catId){

	$sql = "SELECT *
			FROM products
			WHERE id = '{$catId}'
	";

	$rs = mysqli_query($db, $sql);
	$SmartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){
		$SmartyRs[] = $row;
	}
	
	return $SmartyRs;


}
*/


/**
* Получиь данные продукта по ID
*
*
* @param integer $itemId ID продукта
* @return array массив данных продукта
*/
function getProductById($db, $itemId){
	$sql = "SELECT *
			FROM products
			WHERE id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($rs);
}



/**
* Получить список продуктов из массива идентификатор (ID's)
*
* @param type array $itemsIds массив идентификаторов продуктов
* @return array массив данных продуктов
*/
function getProductsFromArray($db, $itemsIds){
	$strIds = implode(', ', $itemsIds);
	$sql = "SELECT *
			FROM products
			WHERE id in ({$strIds})
	";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($db, $rs);
}


function getProducts($db){
	$sql = "SELECT *
			FROM `products`
			ORDER BY category_id
	";
	$rs = mysqli_query($db, $sql);
	return createSmartyRsArray($db, $rs);
}


function insertProduct($db, $itemName, $itemPrice, $itemDesc, $itemCat){
	$sql = "INSERT INTO products
			SET
				`name` = '{$itemName}',
				`price` = '{$itemPrice}',
				`description` = '{$itemDesc}',
				`category_id` = '{$itemCat}'
	";
	$rs = mysqli_query($db, $sql);
	return $rs;
}

function updateProduct($db, $itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null){

	$set = array();

	if($itemName){
		$set[] = "`name` = '{$itemName}'";
	}
	if($itemPrice > 0){
		$set[] = "`price` = '{$itemPrice}'";
	}
	if($itemStatus !== null){
		$set[] = "`status` = '{$itemStatus}'";
	}
	if($itemDesc){
		$set[] = "`description` = '{$itemDesc}'";
	}
	if($itemCat){
		$set[] = "`category_id` = '{$itemCat}'";
	}
	if($newFileName){
		$set[] = "`image` = '{$newFileName}'";
	}

	$setStr = implode($set, ", ");
	$sql = "UPDATE products
			SET {$setStr}
			WHERE id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);

	return $rs;

}




function updateProductImage($db, $itemId, $newFileName){
	$rs = updateProduct($itemId, null, null,
						null, null, null, $newFileName);

	return $rs;
}



function insertImportProducts($db, $aProducts){
	if(! is_array($aProducts)) return false;

	$sql = "INSERT INTO products
			(`name`, `category_id`, `description`, `price`, `status`)
			VALUES
	";
	$cnt = count($aProducts);
	for($i = 0; $i < $cnt; $i++){
		if($i > 0) $sql .= ', ';
		$sql .= "('" . implode("', '" , $aProducts[$i]) . "')";
	}
	$rs = mysqli_query($db, $sql);
	return $rs;
}