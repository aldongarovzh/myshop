<?php

/**
* Контроллер главной страницы
*
*/

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction(){

	echo '</br>' . 'IndexController.php > testAction';

}


/**
* Формирование главной страницы сайта
*
*
* @param object $smarty шаблонизатор
*/
function indexAction_($db, $smarty){

	$rsCategories = getAllMainCatsWithChildren($db); //данная функция сделает запрос в БД где получит, оформит в виде массива и этот массив вернет в переменную $rsCategories. Дальше аналогичным образом передаем в смарти $smarty->assign('pageTitle', 'Главная страница сайта')  и далее в смарти уже выведем на страничку
	$rsProducts = getLastProducts($db, 16);

	$smarty->assign('pageTitle', 'Главная страница сайта');
	$smarty->assign('rsCategories', $rsCategories); // создаем переменную 'rsCategories' в смарти, дальше передаем ей нашу переменную $rsCategories(грубо говоря тоже что и нашей переменной). Благодаря этому в шаблоне главной страницы(index.tpl) мы уже можем обрабатывать данную переменную(данный массив), выводить его на экран
	$smarty->assign('rsProducts', $rsProducts);



	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'index');
	loadTemplate($smarty, 'footer');

}



function indexAction($db, $smarty){

	//> Пагинатор
	$paginator = array();
	$paginator['perPage'] = 9;
	$paginator['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 1;
	$paginator['offset'] = ($paginator['currentPage'] * $paginator['perPage']) - $paginator['perPage'];
	$paginator['link'] = '/index/?page=';

	list($rsProducts, $allCnt) = getLastProducts($db, $paginator['offset'], $paginator['perPage']);

	$paginator['pageCnt'] = ceil($allCnt / $paginator['perPage']);
	$smarty->assign('paginator', $paginator);
	//<

	$rsCategories = getAllMainCatsWithChildren($db); //данная функция сделает запрос в БД где получит, оформит в 

	$smarty->assign('pageTitle', 'Главная страница сайта');
	$smarty->assign('rsCategories', $rsCategories); // создаем переменную 'rsCategories' в смарти, дальше передаем ей нашу переменную $rsCategories(грубо говоря тоже что и нашей переменной). Благодаря этому в шаблоне главной страницы(index.tpl) мы уже можем обрабатывать данную переменную(данный массив), выводить его на экран
	$smarty->assign('rsProducts', $rsProducts);



	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'index');
	loadTemplate($smarty, 'footer');

}