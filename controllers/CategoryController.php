<?php

/**
*	categoryController.php
*
*	Контроллер страницы категории (/category/1)
*
*/


//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
*	Формирование страницы категории
*
*	@param object $smarty шаблонизатор
*
*/
function indexAction($db, $smarty){

	$catId = isset($_GET['id']) ? $_GET['id'] : null;
	if($catId == null) exit();

	$rsProducts = null;
	$rsChildCats = null;
	$rsCategory = getCatById($db, $catId);

	// если главная категория то показываем дочернии категории
	// иначе показываем товар
	if($rsCategory['parent_id'] == 0){

		$rsChildCats = getChildrenForCat($db, $catId);

	} else {

		$rsProducts = getProductsByCat($db, $catId);

	}

	$rsCategories = getAllMainCatsWithChildren($db);
	
	$smarty->assign('pageTitle', 'Товары категории' . $rsCategory['name']);
	$smarty->assign('rsCategory', $rsCategory);
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('rsChildCats', $rsChildCats);
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'category');
	loadTemplate($smarty, 'footer');


}