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
}else{
	$sourceObject = \DDTools\ObjectTools::convertType([
		'object' => $sourceObject,
		'type' => 'objectAuto'
	]);
}

//If need to extend
if (isset($extend)){
	$extend = \DDTools\ObjectTools::convertType([
		'object' => $extend,
		'type' => 'objectArray'
	]);
	
	//If is valid
	if (!empty($extend)){
		array_unshift(
			$extend['objects'],
			$sourceObject
		);
		
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
	$snippetResult = \DDTools\ObjectTools::convertType([
		'object' => $snippetResult,
		'type' => 'stringJsonAuto'
	]);
}

return $snippetResult;
?>