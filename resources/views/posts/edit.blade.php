<x-layout>
    <section class="text-gray-600 body-font">
        <x-form.panel>
            <h1 class="text-center font-bold text-xl">Edit Post: {{ $post->title }}</h1>
            <form method="POST" action="/admin/posts/{{$post->id}}" class="mt-10" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title', $post->title)"/>
                <x-form.input name="slug" :value="old('slug', $post->slug)"/>
                <x-form.textarea name="description">{{ old('description', $post->description) }}</x-form.textarea>
                <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>
                <div>
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                        <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="" class="rounded-xl mb-4" width="100">
                </div>

                <x-form.select name="category_id" :categories="$categories" :post="$post" />

                <x-form.button>Update</x-form.button>
            </form>
        </x-form.panel>
    </section>
</x-layout>