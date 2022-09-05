<?php

/**
* Модель для таблицы категорий (categories)
*
*/



/**
* Получить дочернии категории для категорий $catId($riw['id']) - ниже в массиве
*
* @param integer $catId ID категории
* @return array массив дочерних категорий
*/
function getChildrenForCat($db, $catId){
	$sql = "SELECT *
			FROM categories
			WHERE parent_id = '{$catId}'
	";
	
	$rs = mysqli_query($db, $sql);
	return createSmartyRsArray($db, $rs); //в maiFunctions.php создали функцию эту чтобы было удобно пользоваться данными в массиве для смарти
}


/**
* Получить главные категории с привязками дочерних
*
*
* @return array массив категорий
*/
function getAllMainCatsWithChildren($db){

	$sql = 'SELECT *
			FROM categories
			WHERE parent_id = 0
	';
	$rs = mysqli_query($db, $sql);	//inner запрос параметром передаем $sql запрос и все это помещаем в переменную $rs

	//данные которые буду возвращать в контроллер, а именно в IndexController в переменную, где вызывается данная функция ($rsCategories)
	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){ //цикл внутри телефоны, планшеты , дальше в них ниже помещается $row['children']
		$rsChildren = getChildrenForCat($db, $row['id']); // новая переменная(массив) которая содержит дочерние категории. возвращает массив категорий которые принадлежат $row['id']

		if($rsChildren){
			$row['children'] = $rsChildren; // присвает к главным категориям дочерние категории в виде $row['children']
		}
		$smartyRs[] = $row; // помещаем в массив $smartyRs[] данные sql запроса телефоны, планшеты
	}
	
	return $smartyRs;

}



/**
* Получить данные категории по id
*
* @param integer $catId ID категории
* @return array массив - строка категории
*
*/
function getCatById($db, $catId){

	$catId = intval($catId);
	$sql = "SELECT *
			FROM categories
			WHERE id = '{$catId}'
	";

	$rs = mysqli_query($db, $sql);
	return mysqli_fetch_assoc($rs);
	
}


function getAllMainCategories($db){
	$sql = "SELECT *
			FROM categories
			WHERE parent_id = 0
	";
	$rs = mysqli_query($db, $sql);
	return createSmartyRsArray($db, $rs);
}



/**
*	Добавление новой категории
*	@param string $catName Название категории
*	@param integer $catParentId ID родителськой категории
*	@return integer id новой категории
*/
function insertCat($db, $catName, $catParentId = 0){
	//готовим запрос
	$sql = "INSERT INTO
			categories (`parent_id`, `name`)
			VALUES ('{$catParentId}', '{$catName}')
	";

	//выполянем запрос
	mysqli_query($db, $sql);

	// получаем id добавленной записи
	$id = mysql_insert_id();

	return $id;
}


function getAllCategories($db){
	$sql = "SELECT *
			FROM categories
			ORDER BY parent_id ASC
	";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($db, $rs);
}


function updateCategoryData($db, $itemId, $parentId = -1, $newName = ""){

	$set = array();

	if($newName){
		$set[] = "`name` = `{$newName}`";
	}

	if($parentId > -1){
		$set[] = "`parent_id` = '{$parentId}'";
	}

	$setStr = implode($set, ", ");
	$sql = "UPDATE categories
			SET {$setStr}
			WHERE id = '{$itemId}'
	";
	$rs = mysqli_query($db, $sql);

	return $rs;
}