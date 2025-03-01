<x-layout>
    <x-slot:header>{{$headers}}</x-slot:header>
    
    @foreach ($categories as $post)
        <article class="mx-w-screen-md ">
            <p>- <a href="/blog?category={{$post->slug}}" class="hover:underline">{{$post['name']}}</a></p>
            </article>
    @endforeach
      </x-layout>
     