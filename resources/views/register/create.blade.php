<x-layout>
    <section class="text-gray-600 body-font">
        <x-form.panel>
            <h1 class="text-center font-bold text-xl uppercase">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-form.input name="name" />
                <x-form.input name="username" />
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <x-form.button>Register</x-form.button>
            </form>
        </x-form.panel>
    </section>
</x-layout>