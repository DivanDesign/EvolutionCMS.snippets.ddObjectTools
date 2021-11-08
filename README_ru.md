# (MODX)EvolutionCMS.snippets.ddObjectTools

Инструменты для изменения объектов.


## Использует

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.51


## Документация


### Установка


#### Вручную


##### 1. Элементы → Сниппеты: Создайте новый сниппет со следующими параметрами

1. Название сниппета: `ddObjectTools`.
2. Описание: `<b>0.5</b> Tools for modifying objects.`.
3. Категория: `Core`.
4. Анализировать DocBlock: `no`.
5. Код сниппета (php): Вставьте содержимое файла `ddObjectTools_snippet.php` из архива.


##### 2. Элементы → Управление файлами

1. Создайте новую папку `assets/snippets/ddObjectTools/`.
2. Извлеките содержимое архива в неё (кроме файла `ddObjectTools_snippet.php`).


#### Using [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Просто вызовите следующий код в своих исходинках или модуле [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Подключение (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Установка (MODX)EvolutionCMS.snippets.ddObjectTools
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddObjectTools',
	'type' => 'snippet'
]);
```

* Если `ddObjectTools` отсутствует на вашем сайте, `ddInstaller` просто установит его.
* Если `ddObjectTools` уже есть на вашем сайте, `ddInstaller` проверит его версию и обновит, если нужно. 


### Описание параметров

* `sourceObject`
	* Описание: Исходный объект или массив.
	* Допустимые значения:
		* `stringJsonObject` — в виде [JSON](https://ru.wikipedia.org/wiki/JSON)
		* `stringJsonArray` — в виде [JSON](https://ru.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — в виде [HJSON](https://hjson.github.io/)
		* `stringHjsonArray` — в виде [HJSON](https://hjson.github.io/)
		* `stringQueryFormated` — в виде [Query string](https://en.wikipedia.org/wiki/Query_string)
		* Также может быть задан, как нативный PHP объект или массив (например, для вызовов через `$modx->runSnippet`).
			* `array`
			* `object`
	* Значение по умолчанию: `'{}'`
	
* `extend`
	* Описание: Объединение содержимое двух и более объектов / массивов вместе в `sourceObject` (он получит новые свойства).
	* Допустимые значения:
		* `stringJsonObject` — в виде [JSON](https://ru.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — в виде [HJSON](https://hjson.github.io/)
		* `stringQueryFormated` — в виде [Query string](https://en.wikipedia.org/wiki/Query_string)
		* Также может быть задан, как нативный PHP объект или массив (например, для вызовов через `$modx->runSnippet`).
			* `arrayAssociative`
			* `object`
	* Значение по умолчанию: —
	
* `extend->objects`
	* Описание: Объекты или массивы для объединения. Кроме того, объекты могут расширять массивы и наоборот.
	* Допустимые значения: `array`
	* **Обязателен**
	
* `extend->objects[i]`
	* Описание: Объект или массив, содержащий дополнительные свойства для слияния.
	* Допустимые значения:
		* `object`
		* `array`
	* **Обязателен**
	
* `extend->deep`
	* Описание: Если `true`, слияние становится рекурсивным (так называемое «глубокое копирование»).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `extend->overwriteWithEmpty`
	* Описание: Перезаписать поля пустыми значениями.  
		Следующие значения считаются пустыми:
		* `''` — пустая строка
		* `[]` — пустой массив
		* `(object) []` — пустой объект
		* `NULL`
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `getPropValue`
	* Описание: Возврат значения поля объекта или элемента массива по имени свойства объекта или индексу / ключу массива.
	* Допустимые значения: `string`
	* Значение по умолчанию: —
	
* `outputter`
	* Описание: Формат вывода (когда результат является объектом или массивом).  
		Значения регистронезависимы (следующие значения равны: `jsonauto`, `JsonAuto`, `JSONAUTO` и т. п.).
	* Допустимые значения:
		* `'jsonAuto'` — автоматиески будет выбран `jsonObject` или `jsonArray`, в зависимости от результата
		* `'jsonObject'`
		* `'jsonArray'`
		* `'queryFormated'` — [Query string](https://ru.wikipedia.org/wiki/Query_string)
	* Значение по умолчанию: `'jsonAuto'`


### Примеры


#### Объединить содержимое двух и более объектов вместе в первый объект (параметр `extend`)

```
[[ddObjectTools?
	&sourceObject=`{
		"cat": "mew",
		"dog": {
			"name": "Floyd",
			"weight": 6
		},
		"rabbit": 42
	}`
	&extend=`{
		"objects": [
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

Вернёт:

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


#### Получить значение свойства объекта

```
[[ddObjectTools?
	&sourceObject=`{
		"firstName": "Chuck",
		"lastName": "Norris"
	}`
	&getPropValue=`firstName`
]]
```

Вернёт: `Chuck`.


#### Получить значение элемента массива

```
[[ddObjectTools?
	&sourceObject=`[
		"Pink Floyd",
		"The Beatles",
		"Queen"
	]`
	&getPropValue=`2`
]]
```

Вернёт: `Queen`.


#### Сконвертировать JSON объект в массив

```
[[ddObjectTools?
	&sourceObject=`{
		"firstName": "Angus",
		"lastName": "Young"
	}`
	&outputter=`jsonArray`
]]
```

Вернёт:

```json
[
	"Angus",
	"Young"
]
```


#### Запустить сниппет через `\DDTools\Snippet::runSnippet` без DB и eval

```php
//Подключение (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//Запуск (MODX)EvolutionCMS.snippets.ddObjectTools
\DDTools\Snippet::runSnippet([
	'name' => 'ddObjectTools',
	'params' => [
		'sourceObject' => [
			'cat' => 'mew',
			'dog' => [
				'name' => 'Floyd',
				'weight' => 6
			],
			'rabbit' => 42
		],
		'extend' => [
			'objects' => [
				[
					'dog' => [
						'weight' => 11
					],
					'bird' => 0
				]
			]
		]
	]
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/ddobjecttools)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddobjecttools)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />