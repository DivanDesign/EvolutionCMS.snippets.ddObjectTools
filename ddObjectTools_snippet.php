<?php
/**
 * ddObjectTools
 * @version 0.5 (2021-11-08)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.biz/modx/ddobjecttools
 * 
 * @copyright 2020–2021 DD Group {@link https://DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddObjectTools',
	'params' => $params
]);
?>