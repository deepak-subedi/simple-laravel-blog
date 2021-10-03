<x-layout>
    @if ($posts->count())
        @include('posts._posts-header')

        <section class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($posts as $post)
                        <x-post-card :post="$post"/>
                    @endforeach
                </div>
                <div class="mt-10 mb-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
    @else
        <p class="text-center text-gray-500 text-xl mt-10">No post yet! Post some cool thing!</p>
    @endif
</x-layout>

