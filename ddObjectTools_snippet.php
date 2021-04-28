<?php
/**
 * ddObjectTools
 * @version 0.3 (2020-06-03)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/ddobjecttools
 * 
 * @copyright 2020 DD Group {@link https://DivanDesign.biz }
 */

//# Include
//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);


//# Prepare params
$params = \DDTools\ObjectTools::extend([
	'objects' => [
		//Defaults
		(object) [
			'sourceObject' => '{}',
			'extend' => null,
			'getPropValue' => null
		],
		$params
	]
]);

$params->sourceObject = \DDTools\ObjectTools::convertType([
	'object' => $params->sourceObject,
	'type' => 'objectAuto'
]);


//# Run
//The snippet must return an empty string even if result is absent
$snippetResult = '';

//If need to extend
if (!is_null($params->extend)){
	$params->extend = \DDTools\ObjectTools::convertType([
		'object' => $params->extend,
		'type' => 'objectArray'
	]);
	
	//If is valid
	if (!empty($params->extend)){
		array_unshift(
			$params->extend['objects'],
			$params->sourceObject
		);
		
		$params->sourceObject = \DDTools\ObjectTools::extend($params->extend);
	}
}

//If need to return only specified item
if (!is_null($params->getPropValue)){
	$params->sourceObject = \DDTools\ObjectTools::getPropValue([
		'object' => $params->sourceObject,
		'propName' => $params->getPropValue
	]);
}

$snippetResult = $params->sourceObject;

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