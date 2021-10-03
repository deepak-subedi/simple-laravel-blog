<x-layout>
    <section class="text-gray-600 body-font">
        <x-form.panel>
            <h1 class="text-center font-bold text-xl uppercase">LogIn!</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <x-form.button>Log In</x-form.button>
            </form>
        </x-form.panel>
    </section>
</x-layout>