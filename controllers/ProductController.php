<?php

/**
*
* ProductController.php
*
* Контроллер страницы товара (/product/1)
*
*/

// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
* Формирование страницы продукта
*
*
* @param object $smarty шаблонизатор
*/
function indexAction($db, $smarty){

	$itemId = isset($_GET['id']) ? $_GET['id'] : null;
	if($itemId == null) exit();

	// получить данные продукта
	$rsProduct = getProductById($db, $itemId);

	// получить все категории
	$rsCategories = getAllMainCatsWithChildren($db);

	$smarty->assign('itemInCart', 0);
	if(in_array($itemId, $_SESSION['cart'])){
		$smarty->assign('itemInCart', 1);
	}

	$smarty->assign('PageTitle', '');
	$smarty->assign('rsProduct', $rsProduct);
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'product');
	loadTemplate($smarty, 'footer');
}