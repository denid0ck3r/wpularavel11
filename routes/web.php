<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home', ['headers'=>'Home Page','title'=>'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['headers'=>'About Page']);
});

Route::get('/blog', function () {
   //Eager loading: $posts = Post::with(['author','category'])->latest()->get();
   
//    dump(request('search'));

// $posts = Post::latest(); //Siapkan dulu data select * from

// if(request('search')){ //kalau ada request kita tambahkan datanya, kalau tidak langsung tampilkan seluruhnya

// $posts->where('title', 'like', '%' . request('search') . '%');
// }
// //    $posts = Post::latest()->get();
   
// //    if (request('search')){
//     // $posts->where('title', 'like', '%' . request('search'). '%');

// //    }
    //untuk search query, relate ke model post.php
    return view('posts', ['headers'=>'Blog Page', 'posts' => Post::filter(request(['search', 'category','author']))->latest()->paginate(9)->withQueryString()]);
    // return view('posts', ['headers'=>'Blog Page', 'posts' => $posts->get()]);

});

Route::get('/category', function () {
   //Eager loading $categories = Category::latest()->get();
   $categories = Category::latest()->get();
    return view('categories', ['headers'=>'Category Page', 'categories' => $categories]);

});

Route::get('/contact', function () {
    return view('contact', ['headers'=>'Contact Page']);
});

// Contoh Wildcard - WPU Laravel - 6.View Data
Route::get('/blog/{post:slug}', function (Post $post){

    return view('post',['headers'=>'Single Post','post' => $post]);

//  dd($post);
});

Route::get('/authors/{user:username}', function (User $user){
    // Eager lazy loading : $posts = $user->posts->load('category','author');

    return view('posts',['headers'=> ( count ($user->posts) ) . ' Articles Detected By  ' . $user->name, 'posts' => $user->posts]);

});

Route::get('/categories/{category:slug}', function (Category $category){
    // eager lazy loading $posts = $category->posts->load('category','author');
    return view('posts',['headers'=>'Categories By : ' . $category->name, 'posts' => $category->posts]);

});
