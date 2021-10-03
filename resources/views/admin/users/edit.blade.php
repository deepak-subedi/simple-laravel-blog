<x-layout>
    <section class="text-gray-600 body-font">
        <x-form.panel>
            <h1 class="text-center font-bold text-xl uppercase">Update User!</h1>
            <form method="POST" action="/admin/users/{{$user->id}}" class="mt-10">
                @csrf
                @method('PATCH')
                <x-form.input name="name" :value="old('name', $user->name)"/>
                <x-form.input name="username" :value="old('username', $user->username)" />
                <x-form.input name="email" type="email" :value="old('email', $user->email)"/>
                <x-form.input name="password" type="password" />
                <x-form.button>Update</x-form.button>
            </form>
        </x-form.panel>
    </section>
</x-layout>