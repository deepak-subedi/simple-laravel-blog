@props(['name', 'categories', 'post'])

<div class="mb-6">
    <x-form.label name="{{ $name }}" />

    <select name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option 
                value="{{ $category->id }}"
                {{ old($name, $post->category_id) == $category->id ? 'selected' : '' }}
            >{{ ucwords($category->name) }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</div>