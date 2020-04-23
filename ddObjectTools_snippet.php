<?php
/**
 * ddObjectTools
 * @version 0.1 (2020-04-23)
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

if (isset($extend)){
	$extend = json_decode($extend);
	
	if (is_object($extend)){
		$snippetResult = json_encode(\DDTools\ObjectTools::extend($extend));
	}
}


return $snippetResult;
?>