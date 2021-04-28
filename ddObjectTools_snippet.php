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