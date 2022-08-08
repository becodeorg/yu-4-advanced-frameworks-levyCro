<?php

use App\models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
   $files = File::files(resource_path("posts"));
   $posts= [];

   foreach ($files as $file) {
    $document = YamlFrontMatter::parseFile($file);

    $posts[] = new Post(
        $document->title,
        $document->excerpt,
        $document->date,
        $document->body,
        $document->slug,
    );
   }
   // $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function ($slug) {

    return view('post', [
        'post' => Post::find($slug)
    ]);
 
})->where('post', '[A-z_\-]+');