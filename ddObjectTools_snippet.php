<?php
/**
 * ddObjectTools
 * @version 1.0 (2024-06-13)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddobjecttools
 * 
 * @copyright 2020–2024 Ronef {@link https://Ronef.ru }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddObjectTools',
	'params' => $params,
]);
?>