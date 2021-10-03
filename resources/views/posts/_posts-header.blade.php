<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
            <p class="leading-relaxed text-2xl">Welcome to Laravel Blog</p>
            <div class="mt-8">
                {{-- <x-dropdown :categories="$categories" /> --}}
                <div class="block relative w-100">
                    <form action="#" method="GET">
                        <input class="block appearance-none w-full bg-white border border-gray-400      hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                            type="text"
                            name="search"
                            placeholder="Search Post..."
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>