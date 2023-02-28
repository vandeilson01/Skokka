<x-app-layout>
    <form method="POST" action="{{ route('post.info.create') }}">
        @csrf
        <div class="container mx-auto mt-10 flex flex-col items-center space-y-10">
            <!---  category states address and zipcode -->
            <div class="w-full p-6 space-y-5 bg-zinc-100 rounded border shadow-md">
                <div>
                    <x-input-label for="categories" :value="__('Selecionar categoria')" />
                    <x-select :selects=$categories name="categories" id="categories" key="name" />
                    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                </div>
                <div class="flex space-x-5 items-center justify-between">
                <div class="w-1/2">
                    <x-input-label for="state" :value="__('Selecionar estado')" />
                    <x-select :selects=$states name="state" id="state" key="name" />
                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                </div>
                <div class="w-1/2">
                    <x-input-label for="city" :value="__('Cidade')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus  />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                </div>
            </div>

            <!---  category states address and zipcode -->
            <div class="w-full p-6 space-y-5 bg-zinc-100 rounded border shadow-md">
                <div class="flex space-x-5 items-center justify-between">
                    <div class="w-full">
                        <x-input-label for="title" :value="__('Titulo')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="w-1/6">
                        <x-input-label for="age" :value="__('Idade')" />
                        <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus/>
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
                    <x-input-label for="mobile" :value="__('Seu Telefone')" />
                    <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus/>
                    <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" :value="__('Descrição')" />
                    <textarea class="w-full resize-none rounded h-24" name="description" id="description"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>


            </div>

            <button class="rounded-md bg-pink-700 hover:bg-shokka-pink text-center py-5 w-1/2 mx-auto shadow-md text-white transition ease-in">Continuar</button>

        </div>
         
    </form>
</x-app-layout>