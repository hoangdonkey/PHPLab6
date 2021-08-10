<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Task;
use Illuminate\Http\Request;
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

// Route::get('/', 'HomeController@showWelcome');


Route::get('about', 'AboutController@ShowDetails');

Route::get('about/directions', array('as' => 'directions', function () {
    $theURL = URL::route('directions');
    return "Direction go to this URL {$theURL}";
}));

Route::get('profile/{profileName}', 'ProfileController@showProfile');

Route::any('submit-form', function () {
    return 'Process form';
});

Route::get('about/{theSubject}', 'AboutController@showSubject');

Route::get('{price}/{art}', function ($price, $art) {
    return $price . ' ' . $art;
});

Route::get('where', function () {
    return redirect(route('directions'));
});
Route::get('/insert', function () {
    $insert = DB::insert('insert into posts (title, body) values (?, ?)', ['fake title', 'and this is fake content']);
    return $insert;
});
Route::get('/read', function () {
    $result = DB::select('select * from posts where id > ?', [1]);
    // return $result;
    foreach ($result as $post) {
        return $post->title . '<br>' . $post->body;
    }
});

Route::get('update', function () {
    $update = DB::update('update posts set title = "updated fake title" where id > ?', [1]);
    return $update;
});

Route::get('delete', function () {
    $delete = DB::delete('delete from posts where id > ?', [1]);
    return $delete;
});

Route::get('readAll', function () {
    $post = Post::all();
    foreach ($post as $post) {
        echo $post->title . '<br>';
        echo $post->body . '<br><br>';
    }
});

Route::get('findID', function () {
    $post = Post::where('id', '>=', '1')
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();

    foreach ($post as $post) {
        echo $post->title . '<br>';
        echo $post->body . '<br><br>';
    }
});


//Task

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'desc')->get();
    return view('task', [
        'tasks' => $tasks
    ]);
});

Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255'
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});

Route::delete('task/{task}', function ($id) {
    Task::FindorFail($id)->delete();
    return redirect('/');
});
