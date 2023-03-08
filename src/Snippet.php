<?php
namespace ddObjectTools;

class Snippet extends \DDTools\Snippet {
	protected
		$version = '0.6.0',
		
		$params = [
			//Defaults
			'sourceObject' => '{}',
			'extend' => null,
			'getPropValue' => null,
			'outputter' => 'jsonAuto'
		],
		
		$paramsTypes = [
			'sourceObject' => 'objectAuto'
		]
	;
	
	/**
	 * run
	 * @version 1.1 (2023-03-08)
	 * 
	 * @return {string}
	 */
	public function run(){
		//The snippet must return an empty string even if result is absent
		$result = '';
		
		//If need to extend
		if (!is_null($this->params->extend)){
			$this->params->extend = \DDTools\ObjectTools::convertType([
				'object' => $this->params->extend,
				'type' => 'objectArray'
			]);
			
			//If is valid
			if (!empty($this->params->extend)){
				if (!is_array($this->params->extend['objects'])){
					$this->params->extend['objects'] = \DDTools\ObjectTools::convertType([
						'object' => $this->params->extend['objects'],
						'type' => 'objectArray'
					]);
				}
				
				array_unshift(
					$this->params->extend['objects'],
					$this->params->sourceObject
				);
				
				$this->params->sourceObject = \DDTools\ObjectTools::extend($this->params->extend);
			}
		}
		
		//If need to return only specified item
		if (!is_null($this->params->getPropValue)){
			$this->params->sourceObject = \DDTools\ObjectTools::getPropValue([
				'object' => $this->params->sourceObject,
				'propName' => $this->params->getPropValue
			]);
		}
		
		$result = $this->params->sourceObject;
		
		if (
			is_object($result) ||
			is_array($result)
		){
			$result = \DDTools\ObjectTools::convertType([
				'object' => $result,
				'type' =>
					'string' .
					$this->params->outputter
			]);
		}
		
		return $result;
	}
}