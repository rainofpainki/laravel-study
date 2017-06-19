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

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::get('docs/{file?}', 'DocsController@show');
// Route::get('docs/images/{image}', 'DocsController@image')
//       ->where('image', '[\pL-\pN\._-]+-img-[0-9]{2}.png');
// Route::get('docs/{file?}', 'DocsController@show');
// Route::get('docs/images/{image}', 'DocsController@image')
//       ->where('image', '[\pL-\pN\._-]+-img-[0-9]{2}.png');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');

Route::resource('articles', 'ArticlesController');

Route::get('mail', function () {
  $article = App\Article::with('user')->find(1);

  return Mail::send(
    'emails.articles.created',
    compact('article'),
    function ($message) use ($article) {
      $message->to('christmas@theappsgames.com');
      $message->subject('새 글이 등록되었습니다 -' . $article->title);
    }
  );
});
