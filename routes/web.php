<?php


use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;



Route::get('/',function(){
    return redirect()->route('tasks.index');
});



Route::get('/tasks', function ()  {
    return view('index',[
      'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id) {

    return view('show',['task'=> Task::findOrFail($id)]);
})->name('tasks.show');


Route::post('/task',function(Request $request){
    dd($request->all());
})->name('task.store');

// Route::get('/hello ', function () {
//     return 'Hello';
// })->name('hello');


// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });


Route::fallback(function () {
    return 'Still got somewhere!';
});

//GET
//POST
//PUT
//DELETE
