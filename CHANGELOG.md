# (MODX)EvolutionCMS.snippets.ddObjectTools changelog


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
* \+ Parameters → `sourceObject`, `extend`: Can also be set as `stringQueryFormated`.
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


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>