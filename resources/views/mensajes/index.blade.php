<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mensajes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('mensajes.create') }}"
                                class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                Nuevo mensaje
                            </a>
                        </div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($mensajes as $mensaje)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <div class="group relative">
                                        <a href="{{ route('mensajes.edit', $mensaje) }}">
                                            <div
                                                class="bg-gray-500 text-white p-2 rounded-lg h-24 overflow-clip
                                               hover:bg-gray-700 transition duration-300">
                                                {!! Str::limit($mensaje->mensaje, 75, '...') !!}</div>
                                        </a>
                                        <!-- The message's image -->
                                        <img src="{{ route('mensajes.imagen', $mensaje) }}" alt="{{ $mensaje->nombre }}"
                                            class="w-full object-contain rounded-lg mt-2">
                                    </div>
                                </div>
                            @empty
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        No hay mensajes
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $mensajes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
