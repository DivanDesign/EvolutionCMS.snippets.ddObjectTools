<?php
/**
 * ddObjectTools
 * @version 0.2 (2020-05-14)
 * 
 * @see README.md
 * 
 * @link http://code.divandesign.biz/modx/ddobjecttools
 * 
 * @copyright 2020 DD Group {@link https://www.DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//The snippet must return an empty string even if result is absent
$snippetResult = '';

if (!isset($sourceObject)){
	$sourceObject = '';
}

//If set as JSON
if (is_string($sourceObject)){
	$sourceObject = json_decode($sourceObject);
}

if (
	!is_object($sourceObject) &&
	!is_array($sourceObject)
){
	$sourceObject = new stdClass();
}

//If need to extend
if (isset($extend)){
	if (is_string($extend)){
		$extend = json_decode($extend);
	}
	
	if (
		is_object($extend) ||
		is_array($extend)
	){
		//Prepend source object
		if (is_object($extend)){
			array_unshift(
				$extend->objects,
				$sourceObject
			);
		}else{
			array_unshift(
				$extend['objects'],
				$sourceObject
			);
		}
		
		$sourceObject = \DDTools\ObjectTools::extend($extend);
	}
}

//If need to return only specified item
if (isset($getPropValue)){
	$sourceObject = \DDTools\ObjectTools::getPropValue([
		'object' => $sourceObject,
		'propName' => $getPropValue
	]);
}

$snippetResult = $sourceObject;

if (
	is_object($snippetResult) ||
	is_array($snippetResult)
){
	$snippetResult = json_encode(
		$snippetResult,
		//JSON_UNESCAPED_UNICODE — Не кодировать многобайтные символы Unicode | JSON_UNESCAPED_SLASHES — Не экранировать /
		JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
	);
}

return $snippetResult;
?>