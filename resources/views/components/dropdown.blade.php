@props(['categories'])

<div class="inline-block relative w-64">
    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option>Select Category</option>
        @foreach ($categories as $category)
            <option>
                <a href="/categories/{{ $category->slug }}"
                    class="block text-left px-3 text-sm-leading-6
                    hover:bg-indigo-500 focus:bg-indigo-500 hover:text-white focus:text-white
                    {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-indigo-500 text-white' : '' }}"
                >{{ucwords($category->name)}}</a>
            </option>
        @endforeach
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
</div>