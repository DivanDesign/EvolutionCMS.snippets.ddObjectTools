<?php
namespace ddObjectTools;

class Snippet extends \DDTools\Snippet {
	protected $version = '1.0.0';
	
	protected $params = [
		// Defaults
		'sourceObject' => '{}',
		'extend' => null,
		'getPropValue' => [
			'name' => null,
			'notFoundResult' => null,
		],
		'outputter' => 'stringJsonAuto',
	];
	
	protected $paramsTypes = [
		'sourceObject' => 'objectAuto',
	];
	
	/**
	 * prepareParams
	 * @version 1.2.2 (2025-11-19)
	 * 
	 * @param $params {stdClass|arrayAssociative|stringJsonObject|stringHjsonObject|stringQueryFormatted}
	 * 
	 * @return {void}
	 */
	protected function prepareParams($params = []){
		parent::prepareParams($params);
		
		// Backward compatibility
		$outputterFirstChars = substr(
			strtolower($this->params->outputter),
			0,
			4
		);
		if (
			$outputterFirstChars == 'json'
			|| $outputterFirstChars == 'quer'
		){
			$this->params->outputter =
				'string'
				. $this->params->outputter
			;
		}
		
		$params_getPropValueRaw = $this->params->getPropValue;
		$params_getPropValueObject = \DDTools\ObjectTools::convertType([
			'object' => $params_getPropValueRaw,
			'type' => 'objectStdClass',
		]);
		
		$this->params->getPropValue =
			// If the parameter has been set as an object
			\DDTools\ObjectTools::isPropExists([
				'object' => $params_getPropValueObject,
				'propName' => 'name',
			])
			// Just use the object
			? $params_getPropValueObject
			// If the parameter has been set as simple property name
			: (object) [
				'name' => $params_getPropValueRaw,
				'notFoundResult' => null,
			]
		;
	}
	
	/**
	 * run
	 * @version 1.2.3 (2024-08-06)
	 * 
	 * @return {string}
	 */
	public function run(){
		// If need to extend
		if (!is_null($this->params->extend)){
			$this->params->extend = \DDTools\ObjectTools::convertType([
				'object' => $this->params->extend,
				'type' => 'objectStdClass',
			]);
			
			// If is valid
			if (!\ddTools::isEmpty($this->params->extend)){
				if (!is_array($this->params->extend->objects)){
					$this->params->extend->objects = \DDTools\ObjectTools::convertType([
						'object' => $this->params->extend->objects,
						'type' => 'objectArray',
					]);
				}
				
				array_unshift(
					$this->params->extend->objects,
					$this->params->sourceObject
				);
				
				$this->params->sourceObject = \DDTools\ObjectTools::extend($this->params->extend);
			}
		}
		
		// If need to return only specified item
		if (!is_null($this->params->getPropValue->name)){
			$this->params->sourceObject = \DDTools\ObjectTools::getPropValue([
				'object' => $this->params->sourceObject,
				'propName' => $this->params->getPropValue->name,
				'notFoundResult' => $this->params->getPropValue->notFoundResult,
			]);
		}
		
		$result = $this->params->sourceObject;
		
		if (
			is_object($result)
			|| is_array($result)
		){
			$result = \DDTools\ObjectTools::convertType([
				'object' => $result,
				'type' => $this->params->outputter,
			]);
		}
		
		return $result;
	}
}