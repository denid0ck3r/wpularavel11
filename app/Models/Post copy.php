<?php

namespace App\Models;

use Illuminate\Support\Arr;



class Post
{
    public static function all()
    {
        return [
        [
            'id' => '1',
            'title' => 'Artikel 1',
            'slug' => 'artikel_1',
            'author' => 'Artika',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, eum culpa veniam asperiores suscipit a assumenda, quia exercitationem, molestias unde praesentium obcaecati maiores ut repellendus? Nobis velit suscipit fugiat iusto, eum rerum vitae maiores quod ipsum reprehenderit. Explicabo perspiciatis sed nobis fugiat, error eos. Error magni excepturi optio modi consectetur recusandae nam. Neque dolores beatae quisquam natus dolorum nemo sunt ducimus saepe fuga sequi, laudantium aliquid fugiat aperiam ea sit illum repudiandae maiores tempore'
        ],
        [
            'id' => '2',
            'title' => 'Artikel 2',
            'slug' => 'artikel_2',
            'author' => 'Fikantropika',
            'body' => 'Excepturi, eum culpa veniam asperiores suscipit a assumenda, quia exercitationem, molestias unde praesentium obcaecati maiores ut repellendus? Nobis velit suscipit fugiat iusto, eum rerum vitae maiores quod ipsum reprehenderit. Explicabo perspiciatis sed nobis fugiat, error eos. Error magni excepturi optio modi consectetur recusandae nam. Neque dolores beatae quisquam natus dolorum nemo sunt ducimus saepe fuga sequi.'
        ],
    ];
    }

    public static function find($slug): array
    {
        // return Arr::first(static::all(), function($post) use ($slug){
        //     return $post['slug'] == $slug;
        // });
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        // Menampilkan pesan error jika post yang dicari tidak ketemu
        if (! $post) {
            abort(404);
        }

        return $post;
    }
}