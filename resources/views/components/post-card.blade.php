@props(['post'])

<div>
    <div class="bg-gray-100 p-6 rounded-lg">
        <img class="h-60 rounded w-full object-cover object-center" src="{{ asset('storage/'. $post->thumbnail) }}" alt="content">

        <div class="py-4">
            <x-category-button :category="$post->category"/>
        </div>
        
        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
            By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
        </h3>
        
        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
            <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <p class="leading-relaxed text-base">
            {!! $post->description !!}
        </p>
    </div>
</div>

