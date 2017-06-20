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

// Route::get('mail', function () {
//   $article = App\Article::with('user')->find(1);
//
//   return Mail::send(
//     'emails.articles.created',
//     compact('article'),
//     function ($message) use ($article) {
//       $message->to('christmas@theappsgames.com');
//       $message->subject('새 글이 등록되었습니다 -' . $article->title);
//     }
//   );
// });


Route::get('markdown', function () {
  $text = <<<EOT
# 마크다운 예제 1

이 문서는 [마크다운][1]으로 썻습니다. 화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫번째 항목
- 두번째 항목[^1]

[1]: http://daringfireball.net/projects/markdown

[^1]: 두번째 항목_ http://google.com
EOT;
  return app(ParsedownExtra::class)->text($text);
});
