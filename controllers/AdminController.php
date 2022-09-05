<?php

/**
*	AdminController.php
*
*
*	Контроллер бэкенда сайта (/admin/)
*/

//	подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('teplateWebPath', TemplateAdminWebPath);


function indexAction($db, $smarty){

	$rsCategories = getAllMainCategories($db);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');


	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'admin');
	loadTemplate($smarty, 'adminFooter');
}

function addnewcatAction($db){
	$catName = $_POST['newCategoryName'];
	$catParentId = $_POST['generalCatId'];

	$res = insertCat($db, $catName, $catParentId);
	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Категория добавлена';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка добавления категории';
	}

	echo json_encode($resData);
	return;
}



function categoryAction($db, $smarty){
	$rsCategories = getAllCategories($db);
	$rsMainCategories = getAllMainCategories($db);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsMainCategories', $rsMainCategories);
	$smarty->assign('pageTitle', 'Управление сайтом');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminCategory');
	loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction($db){
	$itemId = $_POST['itemId'];
	$parentId = $_POST['parentId'];
	$newName = $_POST['newName'];

	$res = updateCategoryData($db, $itemId, $parentId, $newName);

	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Категория обновлена';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных категории';
	}

	echo json_encode($resData);
	return;
}

/*
*	Страница управления товарами
*
*	@param type $smarty
*/
function productsAction($db, $smarty){
	$rsCategories = getAllMainCategories($db);
	$rsProducts = getProducts($db);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	$smarty->assign('pageTitle', 'Управление сайтом');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminProducts');
	loadTemplate($smarty, 'adminFooter');
}



function addproductAction($db){
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	$res = insertProduct($db, $itemName, $itemPrice, $itemDesc, $itemCat);

	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Изменения успешно внесены';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных';
	}

	echo json_encode($resData);
	return;
}


function updateproductAction($db){
	$itemId = $_POST['itemId'];
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemStatus = $_POST['itemStatus'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	$res = updateProduct($db, $itemId, $itemName, $itemPrice,
		$itemStatus, $itemDesc, $itemCat);

	if($res){
		$resData['success'] = 1;
		$resData['message'] = 'Изменения успешно внесены';
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка изменения данных';
	}

	echo json_encode($resData);
	return;


}



function uploadAction($db){
	$maxSize = 2 * 1024 * 1024;

	$itemId = $_POST['itemId'];
	//получаем расширение загружаемого файла
	$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
	// создаем имя файла
	$newFileName = $itemId . '.' . $ext;

	if($_FILES["filename"]["size"] > $maxSize){
		echo ("Размер файла превышает два мегабайта");
		return;
	}

	//загружен ли файл
	if(is_uploaded_file($_FILES['filename']['tmp_name'])){
		// Если файл загружен то перемещаем его из временной директории в конечную
		$res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' . $newFileName);
		if($res){
			$res = updateProductImage($db, $itemId, $newFileName);
			if($res){
				redirect('/admin/products/');
			}
		}

	} else {
		echo("Ошибка загрузки файла");
	}


}


function ordersAction($smarty){
	$rsOrders = getOrders();

	$smarty->assign('rsOrders', $rsOrders);
	$smarty->assign('pageTitle', 'Заказы');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminOrders');
	loadTemplate($smarty, 'adminFooter');
}



function setorderstatusAction(){
	$itemId = $_POST['itemId'];
	$status = $_POST['status'];

	$res = updateOrderStatus($itemId, $status);

	if($res){
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}


function setorderdatepaymentAction(){
	$itemId = $_POST['itemId'];
	$datePayment = $_POST['datePayment'];

	$res = updateOrderDatePayment($itemId, $datePayment);

	if($res){
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
		$resData['succes'] = 'Ошибка установки статуса';
	}

	echo json_encode($resData);
	return;
}




function createxmlAction(){
	$rsProducts = getProducts();

	$xml = new DomDocument('1.0', 'utf-8');
	$xmpProducts = $xml->appendChild($xml->createElement('products'));

	foreach ($rsProducts as $product){
		$xmpProduct = $xmpProducts->appendChild($xml->createElement('product'));
		foreach ($product as $key => $val){
			$xmlName = $xmpProduct->appendChild($xml->createElement($key));
			$xmlName->appendChild($xml->createTextNode($val));
		}
	}

	$xml->save($_SERVER["DOCUMENT_ROOT"] . '/xml/products.xml');
	echo 'ok';
}


function uploadFile($localFilename, $localPath = '/upload/'){

	$maxSize = 2 * 1024 * 1024;

	// получаем расширение загружаемого файла
	$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

	$pathInfo = pathinfo($localFilename);
	if($ext != $pathInfo['extension']) return false;

	$newFileName = $pathInfo['filename'] . '_' . time() . '.' . $pathInfo['extension'];

	if($_FILES["filename"]["size"] > $maxSize){
		return false;
	}

	$path = $_SERVER['DOCUMENT_ROOT'] . $localPath;
	if(! file_exists($path)){
		mkdir($path);
	}

	if(is_uploaded_file($_FILES['filename']['tmp_name'])){
		$res = move_uploaded_file($_FILES['filename']['tmp_name'], $path . $newFileName);
			return($res == true) ? $newFileName : false;
	} else {
		return false;
	}
}



function loadfromxmlAction(){
	$successUploadFileName = uploadFile('/xml/import/', 'import_products.xml');
	if(! $successUploadFileName){
		echo 'Ошибка загрузки файла';
		return;
	}

	$xmlFile = $_SERVER['DOCUMENT_ROOT'].'/xml/import/' .$successUploadFileName;
	$xmlProducts = simplexml_load_file($xmlFile);

	$products = array(); $i = 0;
	foreach($xmlProducts as $product){
		$products[$i]['name'] = htmlentities($product->name);
		$products[$i]['category_id'] = intval($product->category_id);
		$products[$i]['description'] = htmlentities($product->description);
		$products[$i]['price'] = intval($product->price);
		$products[$i]['status'] = intval($product->status);
		$i++;
	}

	$res = insertImportProducts($products);

	if($res){
		redirect('/admin/products/');
	}
}