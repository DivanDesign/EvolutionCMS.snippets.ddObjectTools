# (MODX)EvolutionCMS.snippets.ddObjectTools

Tools for modifying objects.


## Requires

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.62



## Installation


### Manually


#### 1. Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddObjectTools`.
2. Description: `<b>0.7</b> Tools for modifying objects.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddObjectTools_snippet.php` file from the archive.


#### 2. Elements → Manage Files

1. Create a new folder `assets/snippets/ddObjectTools/`.
2. Extract the archive to the folder (except `ddObjectTools_snippet.php`).


### Using [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Just run the following PHP code in your sources or [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Include (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Install (MODX)EvolutionCMS.snippets.ddObjectTools
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddObjectTools',
	'type' => 'snippet',
]);
```

* If `ddObjectTools` is not exist on your site, `ddInstaller` will just install it.
* If `ddObjectTools` is already exist on your site, `ddInstaller` will check it version and update it if needed.


## Parameters description

* `sourceObject`
	* Desctription: Source object or array.
	* Valid values:
		* `stringJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringJsonArray` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — as [HJSON](https://hjson.github.io/)
		* `stringHjsonArray` — as [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
		* It can also be set as a native PHP object or array (e. g. for calls through `$modx->runSnippet`):
			* `array`
			* `object`
	* Default value: `'{}'`
	
* `extend`
	* Desctription: Merge the contents of two or more objects / arrays together into `sourceObject` (it will receive the new properties).
	* Valid values:
		* `stringJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — as [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
		* It can also be set as a native PHP object or array (e. g. for calls through `$modx->runSnippet`):
			* `arrayAssociative`
			* `object`
	* Default value: —
	
* `extend->objects`
	* Desctription: Objects or arrays to merge. Moreover, objects can extend arrays and vice versa.
	* Valid values:
		* `array`
		* `stringJsonArray` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringHjsonArray` — as [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
	* **Required**
	
* `extend->objects[i]`
	* Desctription: An object or array containing additional properties to merge in.
	* Valid values:
		* `object`
		* `array`
	* **Required**
	
* `extend->deep`
	* Desctription: If true, the merge becomes recursive (aka “deep copy”).
	* Valid values: `boolean`
	* Default value: `true`
	
* `extend->overwriteWithEmpty`
	* Desctription: Overwrite fields with empty values.  
		The following values are considered to be empty:
		* `''` — an empty string
		* `[]` — an empty array
		* `(object) []` — an empty object
		* `NULL`
	* Valid values: `boolean`
	* Default value: `true`
	
* `getPropValue`
	* Desctription: This parameter allows you to return required property of an object.
	* Valid values:
		* `string` — just name of a property or array index / key to return, use as `getPropValue->name` in this case
		* An object of additional parameters:
			* `stringJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
			* `stringHjsonObject` — as [HJSON](https://hjson.github.io/)
			* `stringQueryFormatted` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
			* It can also be set as native PHP object or array (e. g. for calls through `\DDTools\Snippet::runSnippet` or `$modx->runSnippet`):
				* `arrayAssociative`
				* `object`
	* Default value: —
	
* `getPropValue->name`
	* Desctription: Object property name or array index / key to return.  
		You can also use `'.'` to get nested properties (see `\DDTools\ObjectTools::getPropValue` for more info).
	* Valid values: `string`
	* **Required**
	
* `getPropValue->notFoundResult`
	* Description: What will be returned when the property is not found.
	* Valid values: `mixed`
	* Default value: `null`
	
* `outputter`
	* Desctription: Output format (when result is an object or array).  
		Values are case insensitive (the following values are equal: `'stringjsonauto'`, `'stringJsonAuto'`, `'STRINGJSONAUTO'`, etc).
	* Valid values:
		* The snippet can return object as string:
			* `'stringJsonAuto'` — `stringJsonObject` or `stringJsonArray` depends on result object
			* `'stringJsonObject'`
			* `'stringJsonArray'`
			* `'stringQueryFormatted'` — [Query string](https://en.wikipedia.org/wiki/Query_string)
		* The snippet can also return object as a native PHP object or array (it is convenient to call through `\DDTools\Snippet`).
			* `'objectAuto'` — `stdClass` or `array` depends on result object
			* `'objectStdClass'` — `stdClass`
			* `'objectArray'` — `array`
	* Default value: `'stringJsonAuto'`


## Examples

All examples are written using [HJSON](https://hjson.github.io/), but if you want you can use vanilla JSON instead.


### Merge the contents of two or more objects together into the first object (the `extend` parameter)

```
[[ddObjectTools?
	&sourceObject=`{
		cat: mew
		dog: {
			name: Floyd
			weight: 6
		}
		rabbit: 42
	}`
	&extend=`{
		objects: [
			{
				dog: {
					weight: 10
				}
				bird: 0
			}
		]
	}`
]]
```

Returns:

```json
{
	"cat": "mew",
	"dog": {
		"name": "Floyd",
		"weight": 10,
	},
	"rabbit": 42,
	"bird": 0
}
```


### Get an object property

```
[[ddObjectTools?
	&sourceObject=`{
		firstName: Chuck
		lastName: Norris
	}`
	&getPropValue=`firstName`
]]
```

Returns: `Chuck`.


#### Custom results when the property is not found

```
[[ddObjectTools?
	&sourceObject=`{
		firstName: Viktor
		lastName: Tsoi
		dates: {
			born: 1962.06.21
		}
	}`
	&getPropValue=`{
		name: dates.death
		notFoundResult: forever alive
	}`
]]
```

Returns: `forever alive`.


### Get an array element

```
[[ddObjectTools?
	&sourceObject=`[
		Pink Floyd
		The Beatles
		Queen
	]`
	&getPropValue=`2`
]]
```

Returns: `Queen`.


### Convert a JSON object to an array

```
[[ddObjectTools?
	&sourceObject=`{
		firstName: Angus
		lastName: Young
	}`
	&outputter=`jsonArray`
]]
```

Returns:

```json
[
	"Angus",
	"Young"
]
```


### Run the snippet through `\DDTools\Snippet::runSnippet` without DB and eval

```php
//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//Run (MODX)EvolutionCMS.snippets.ddObjectTools
\DDTools\Snippet::runSnippet([
	'name' => 'ddObjectTools',
	'params' => [
		'sourceObject' => [
			'cat' => 'mew',
			'dog' => [
				'name' => 'Floyd',
				'weight' => 6,
			],
			'rabbit' => 42,
		],
		'extend' => [
			'objects' => [
				[
					'dog' => [
						'weight' => 11,
					],
					'bird' => 0,
				],
			],
		],
	],
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/ddobjecttools)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddobjecttools)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddObjectTools)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />