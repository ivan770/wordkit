<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/translate/{lang_from}/{lang_to}/{word}', 'WordController@Translate');

$router->get('/spellcheck/{lang}/{word}', 'WordController@SpellChecker');

$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->post('add', 'AdminController@AddSpellCheckerWord');
    $router->post('remove', 'AdminController@RemoveSpellCheckerWord');
});