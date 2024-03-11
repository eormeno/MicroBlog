<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo mensaje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <form method="post" action="{{ route('mensajes.store') }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        <!-- mensaje -->
                        <div>
                            <x-input-label for="mensaje" :value="__('Mensaje')" />
                            <x-text-input id="mensaje" class="block mt-1 w-full" type="text" name="mensaje"
                                :value="old('mensaje')" required autofocus autocomplete="mensaje" />
                            <x-input-error :messages="$errors->get('mensaje')" class="mt-2" />
                        </div>

                        <!-- imagen -->
                        <div class="mt-4">
                            <x-input-label for="imagen" :value="__('Imagen')" />
                            <x-file-input id="imagen" class="block mt-1 w-full" name="imagen" :value="old('imagen')"
                                required accept="image/png" />
                            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
