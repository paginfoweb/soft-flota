<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
 * Rutas de autenticacion
 */
Route::get('auth/login', [
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'auth.login'
]);

Route::post('auth/login', [
    'uses'  => 'Auth\AuthController@postLogin',
    'as'    => 'auth.login'
]);

Route::get('auth/logout', [
    'uses'  => 'Auth\AuthController@getLogout',
    'as'    => 'auth.logout'
]);

Route::group(['prefix' => 'admin','middleware' => 'auth'],function()
{
    Route::get('index',['as' => 'admin.index', function () {
        return view('admin.index');
    }]);
    /*
     * Rutas de users
     */
    Route::resource('users','UsersControllers');
    Route::get('users/{id}/destroy',[
        'uses'  =>  'UsersControllers@destroy',
        'as'    =>  'admin.users.destroy'
    ]);
    Route::get('users/{id}/active',[
        'uses'  =>  'UsersControllers@active',
        'as'    =>  'admin.users.active'
    ]);
    /*
    * Rutas de Talleres
     */
    Route::resource('talleres','TalleresControllers');
    Route::get('talleres/{id}/destroy',[
        'uses'  =>  'TalleresControllers@destroy',
        'as'    =>  'admin.talleres.destroy'
    ]);
    Route::get('talleres/{id}/active',[
        'uses'  =>  'TalleresControllers@active',
        'as'    =>  'admin.talleres.active'
    ]);
    /*
    * Rutas de Almacenes
     */
    
    Route::resource('almacenes','AlmacenesControllers');
    Route::get('almacenes/{id}/destroy',[
        'uses'  =>  'AlmacenesControllers@destroy',
        'as'    =>  'admin.almacenes.destroy'
    ]);
    Route::get('almacenes/{id}/active',[
        'uses'  =>  'AlmacenesControllers@active',
        'as'    =>  'admin.almacenes.active'
    ]);
});
