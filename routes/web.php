<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', 'TaskController@index');
 
Route::get('/tasks', 'TaskController@getTasks')->name('datatable.tasks');*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('home');
});

Route::get('/charts', function(){
	return View::make('mcharts');
});

Route::get('/tables', function(){
	return View::make('table');
});

Route::get('/forms', function(){
	return View::make('form');
});

Route::get('/grid', function(){
	return View::make('grid');
});

Route::get('/buttons', function(){
	return View::make('buttons');
});

Route::get('/icons', function(){
	return View::make('icons');
});

Route::get('/panels', function(){
	return View::make('panel');
});

Route::get('/typography', function(){
	return View::make('typography');
});

Route::get('/notifications', function(){
	return View::make('notifications');
});

Route::get('/blank', function(){
	return View::make('blank');
});

Route::get('/documentation', function(){
	return View::make('documentation');
});

/*************************************** GLC_APP ***************************************/
Route::get('/login', function(){
	return View::make('login');
});

Route::group(['prefix' => 'admin'], function () {

	Route::group(['prefix' => 'contabilidad'], function () {

		Route::group(['prefix' => 'apa'], function () {
			
			Route::get('/', 'APAController@index');
 
			Route::get('/apas', 'APAController@getApas')->name('datatable.apas');

			Route::get('/registrar_apa', 'APAController@create');

			Route::get('/editar_apa', function(){
				return View::make('admin.contabilidad.apa.editar_apa');
			});
		});

		Route::group(['prefix' => 'facturas'], function () {
			Route::get('/dashboard_facturas', function(){
				return View::make('admin.contabilidad.facturas.dashboard_facturas');
			});

			Route::get('/crear_facturaGLC', function(){
				return View::make('admin.contabilidad.facturas.crear_facturaGLC');
			});
		});

		Route::group(['prefix' => 'comisiones'], function () {
			Route::get('/dashboard_comisiones', function(){
				return View::make('admin.contabilidad.comisiones.dashboard_comisiones');
			});
		});

		Route::group(['prefix' => 'ordenes-pago'], function () {
			Route::get('/comisiones_socios', function(){
				return View::make('admin.contabilidad.ordenes_pago.comisiones_socios');
			});
			
			Route::get('/comisiones_intermediarios', function(){
				return View::make('admin.contabilidad.ordenes_pago.comisiones_intermediarios');
			});
			
			Route::get('/comisiones_empleados', function(){
				return View::make('admin.contabilidad.ordenes_pago.comisiones_empleados');
			});
			
			Route::get('/pagos_servicios', function(){
				return View::make('admin.contabilidad.ordenes_pago.pagos_servicios');
			});
		});
	});

	Route::group(['prefix' => 'charters'], function () {

		Route::get('/', 'ChartersController@index');
 
		Route::get('/charters', 'ChartersController@getCharters')->name('datatable.charters');

		Route::get('/registrar_charter', 'ChartersController@create');
		
		Route::get('/editar_charter', 'ChartersController@edit');
		
		Route::get('/ver_charter', 'ChartersController@show');

		Route::group(['prefix' => 'apa'], function () {
			Route::get('/ver_apa', 'ChartersController@verApa');
		});
	});
});
