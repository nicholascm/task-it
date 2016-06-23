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


Route::get('/', function () {
    return redirect('/tasks');
});
/*
Route::get('/base', function() {
    $tasks = Task::orderBy('created_at', 'asc')->get(); 
    
    return view('tasks', ['tasks'=>$tasks]); //associative array assigns tasks array to the 'tasks' key
}); 

Route::post('/base/task', function(Request $request) {
    
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255'
        ]); 
        
    if ($validator->fails()) {
        return redirect('/public/base')
            ->withInput()
            ->withErrors($validator); 
    }
    
    //create tasks list? 
    
    $task = new Task; 
        $task->name = $request->name; 
        $task->save(); 
        return redirect('/base'); 
    
}); 

Route::delete('/base/task/{id}', function($id) {
    Task::findOrFail($id)->delete(); 
    
    return redirect('/base'); 
        
}); 
*/

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy'); 

Route::post('/task/update/{task}', 'TaskController@update'); 
Route::post('/task/complete/{task}', 'TaskController@setCompletionStateTask'); 

// Authentication Routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration Routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');