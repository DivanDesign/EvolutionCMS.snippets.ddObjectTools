# (MODX)EvolutionCMS.snippets.ddObjectTools changelog


## Версия 0.4 (2021-04-28)
* \* Внимание! Требуется PHP >= 5.6.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.49.1.
* \+ Параметры → `sourceObject`, `extend`: Также может быть задан, как [HJSON](https://hjson.github.io/).
* \+ Запустить сниппет без DB и eval можно через `\DDTools\Snippet::runSnippet` (см. примеры в README).
* \+ `\ddObjectTools\Snippet`: Новый класс. Весь код сниппета перенесён туда.
* \+ README:
	* \+ Документация → Установка → Используя (MODX)EvolutionCMS.libraries.ddInstaller.
	* \+ Ссылки → Packagist.
	* \+ Улучшения текста.
* \+ README_ru.
* \+ Composer.json → `support`.


## Версия 0.3 (2020-06-03)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.38.1.
* \+ Параметры → `sourceObject`, `extend`: Также может задаваться как `stringQueryFormated`.
* \* Рефакторинг.
* \* README:
	* \- Home page.
	* \+ Ссылки.
* \+ CHANGELOG_ru.


## Версия 0.2 (2020-05-14)
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.34.
* \+ Параметры → `sourceObject`.
* \+ Параметры → `getPropValue`. Возможность вернуть заданное свойство объекта / элемент массива.
* \+ Параметры → `extend`:
	* \+ Объекты могут расширять массивы и наоборот.
	* \+ Типы вложенных объектов независимы от типов их родителей.
* \+ Параметры → `extend->overwriteWithEmpty`. Возможность предотвратить перезапись полей пустыми значениями.
* \+ Параметры → `sourceObject`, `extend`: Могут быть заданы в виде объектов и массивов PHP, не только JSON строк (например, для вызовов через `$modx->runSnippet`).
* \* Если параметры не заданы или не валидны, будет возвращён пустой объект `'{}'`.
* \* Composer.json:
	* \+ `homepage`.
	* \+ `authors`.
	* \+ `keywords`:
		* \+ `extend json`.
		* \+ `extend objects`.
		* \+ `extend arrays`.
	* \* `require` → `dd/evolutioncms-libraries-ddtools`:
		* \* Переменовано из `dd/modxevo-library-ddtools`.
		* \* Обновлён формат версии.


## Версия 0.1 (2020-04-23)
* \+ Первый релиз.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>