<?php

/*
*
* Формирование запрашиваемой страницы
*
* @param string $conrtollerName название контроллера
* @param string $actionName название функции обработки страницы
*/
function loadPage($db, $smarty, $controllerName, $actionName = 'index', $categoryId = Null){

	include_once PathPrefix . $controllerName . PathPostfix;
	
	$function = $actionName . 'Action';
	$function($db, $smarty, $categoryId);

}



/**
* Загрузка шаблона
*
*
* @param object $smarty объект шаблонизатора
* @param string $templateName название файла шаблона
*/
function loadTemplate($smarty, $templateName){

	$smarty->display($templateName . TemplatePostfix); //формируем имя шаблона | index.tpl

}


function d($value = null, $die = 1){

	echo 'Debug: <br/><pre>';
	print_r($value);
	echo '</pre>';

	if($die) die;

}


/**
* Преобразование результата работы функции выборки в оссоциативный массив
*
* @param recordset $rs набор строк - результат работы SELECT
* @return array
*/
function createSmartyRsArray($db, $rs){
	
	if(! $rs) return false;

	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){
		$smartyRs[] = $row;
	}
	return $smartyRs;
}

function redirect($url){ //урок 4.5
	if(! $url) $url = '/';
	header("Location: {$url}");
	exit();
}