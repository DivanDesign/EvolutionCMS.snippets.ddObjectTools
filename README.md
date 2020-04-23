# (MODX)EvolutionCMS.snippets.ddObjectTools

Tools for modifying objects.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.biz/modx/ddtools) >= 0.31


## Documentation


### Installation

Elements → Snippets: Create a new snippet with the following data:
1. Snippet name: `ddObjectTools`.
2. Description: `<b>0.1</b> Tools for modifying objects.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddObjectTools_snippet.php` file from the archive.


### Parameters description

* `extend`
	* Desctription: Merge the contents of two or more objects together into the first object.
	* Valid values: `stringJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
	* Default value: —
	
* `extend->objects`
	* Desctription: Objects to merge.
	* Valid values: `array`
	* **Required**
	
* `extend->objects[0]`
	* Desctription: The object to extend. It will receive the new properties.
	* Valid values:
		* `object`
		* `NULL` — pass `NULL` to create the new object.
	* **Required**
	
* `extend->objects[i]`
	* Desctription: An object containing additional properties to merge in.
	* Valid values: `object`
	* **Required**
	
* `extend->deep`
	* Desctription: If true, the merge becomes recursive (aka. deep copy).
	* Valid values: `boolean`
	* Default value: `true`


### Examples


#### Merge the contents of two or more objects together into the first object (the `extend` parameter)

Some example description.

```
[[ddObjectTools?
	&extend=`{
		"objects": [
			{
				"cat": "mew",
				"dog": {
					"name": "Floyd",
					"weight": 6
				},
				"rabbit": 42
			},
			{
				"dog": {
					"weight": 10
				},
				"bird": 0
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
	"bird": 0,
}
```


## [Home page →](https://code.divandesign.biz/modx/ddobjecttools)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />