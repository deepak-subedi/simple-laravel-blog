<x-layout>
    <section class="text-gray-600 body-font">
        <x-form.panel>
            <h1 class="text-center font-bold text-xl">Create New Post</h1>
            <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.textarea name="description" />
                <x-form.textarea name="body" />
                <x-form.input name="thumbnail" type="file" />
 
                <div class="mb-6">
                    <x-form.label name="Category" />
                
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id }}"
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                
                    <x-form.error name="category_id" />
                </div>

                <x-form.button>Publish</x-form.button>
            </form>
        </x-form.panel>
    </section>
</x-layout>