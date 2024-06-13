# (MODX)EvolutionCMS.snippets.ddObjectTools changelog


## Version 0.7 (2023-03-30)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.57 is required.
* \+ Parameters → `getPropValue`: You can now get the value of an object property or an array element in any nesting level. Just use `.` to get nested properties (see `\DDTools\ObjectTools::getPropValue` for more info).
* \* Parameters → `outputter` → Valid values:
	* \+ The snippet can also return object as a native PHP object or array (it is convenient to call through `\DDTools\Snippet`). The following new values:
		* \* `'objectAuto'`.
		* \* `'objectStdClass'`.
		* \* `'objectArray'`.
	* \* The foillowing have been changed (with backward compatibility):
		* \* `'jsonAuto'` → `'stringJsonAuto'`.
		* \* `'jsonObject'` → `'stringJsonObject'`.
		* \* `'jsonArray'` → `'stringJsonArray'`.
		* \* `'queryFormated'` → `'stringQueryFormatted'`.


## Version 0.6 (2023-03-08)
* \+ Parameters → `extend->objects`: Can also be set as [JSON](https://en.wikipedia.org/wiki/JSON), [HJSON](https://hjson.github.io/) or [Query string](https://en.wikipedia.org/wiki/Query_string).


## Version 0.5 (2021-11-08)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.51 is required.
* \+ Parameters → `outputter`: The new parameter. Allows to forcibly convert the snippet result into a JSON object/array or URL-encoded query string if needed.


## Version 0.4 (2021-04-28)
* \* Attention! PHP >= 5.6 is required.
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.49.1 is required.
* \+ Parameters → `sourceObject`, `extend`: Can also be set as [HJSON](https://hjson.github.io/).
* \+ You can just call `\DDTools\Snippet::runSnippet` to run the snippet without DB and eval (see README → Examples).
* \+ `\ddObjectTools\Snippet`: The new class. All snippet code was moved here.
* \+ README:
	* \+ Documentation → Installation → Using (MODX)EvolutionCMS.libraries.ddInstaller.
	* \+ Links → Packagist.
	* \+ Text improvements.
* \+ README_ru.
* \+ Composer.json → `support`.


## Version 0.3 (2020-06-03)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.38.1 is required.
* \+ Parameters → `sourceObject`, `extend`: Can also be set as `stringQueryFormatted`.
* \* Refactoring.
* \* README:
	* \- Home page.
	* \+ Links.
* \+ CHANGELOG_ru.


## Version 0.2 (2020-05-14)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.34 is required.
* \+ Parameters → `sourceObject`.
* \+ Parameters → `getPropValue`. The ability to return specified object property / array element.
* \+ Parameters → `extend`:
	* \+ Objects can extend arrays and vice versa.
	* \+ Types of nested objects are independent on types of their parents.
* \+ Parameters → `extend->overwriteWithEmpty`. The ability to prevent overwriting fields with empty values.
* \+ Parameters → `sourceObject`, `extend`: Can be set as native PHP objects or arrays, not only JSON strings (e. g. for `$modx->runSnippet`).
* \* If parameters are not set or invalid, the empty object will be returned `'{}'`.
* \* Composer.json:
	* \+ `homepage`.
	* \+ `authors`.
	* \+ `keywords`:
		* \+ `extend json`.
		* \+ `extend objects`.
		* \+ `extend arrays`.
	* \* `require` → `dd/evolutioncms-libraries-ddtools`:
		* \* Renamed from `dd/modxevo-library-ddtools`.
		* \* Version format updated.


## Version 0.1 (2020-04-23)
* \+ The first release.


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
<style>ul{list-style:none;}</style>