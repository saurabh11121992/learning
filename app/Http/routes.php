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

use App\Task;
use Illuminate\Http\Request;
//Route::get('/', 'WelcomeController@index');

//Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/


/**
 * Display All Tasks
 */
Route::get('/', function () {
	
	$tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
   // return view('tasks');
	
});


/**
 * Display All Tasks
 */
Route::get('/addtask', function () {
	
	
    return view('addtask');
	
});


/**
 * Add A New Task
 */
//Route::post('/task', function (Request $request) {
    //
//});
Route::post('/task', function (Request $request) {
    /*$validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }*/

    // Create The Task...
	
	$task = new Task;
    $task->name = $request->name;
	$task->createdby = $request->createdby;

    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    //
	
	 Task::findOrFail($id)->delete();

    return redirect('/');
});
