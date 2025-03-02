<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Información') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Página de Información</h3>
                    <form action="{{ route('infos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre</label>
                            <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700">Telefono</label>
                            <input type="text" id="phone" name="phone" class="w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">Locación</label>
                            <input type="text" id="location" name="location" class="w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Descripción</label>
                            <textarea id="description" name="description" class="w-full border-gray-300 rounded-md p-2"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="experience" class="block text-gray-700">Experiencia</label>
                            <textarea id="experience" name="experience" class="w-full border-gray-300 rounded-md p-2"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="github" class="block text-gray-700">Github</label>
                            <input type="url" id="github" name="github" class="w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div class="mb-4">
                            <label for="linkedin" class="block text-gray-700">Linkedin</label>
                            <input type="url" id="linkedin" name="linkedin" class="w-full border-gray-300 rounded-md p-2">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Guardar</button>
                        </div>
                    </form>
                    <h3 class="text-lg font-semibold mt-8 mb-4">Datos Guardados</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Email</th>
                                <th class="border p-2">Nombre</th>
                                <th class="border p-2">Telefono</th>
                                <th class="border p-2">Descripción</th>
                                <th class="border p-2">Experiencia</th>
                                <th class="border p-2">Locación</th>
                                <th class="border p-2">Github</th>
                                <th class="border p-2">Linkedin</th>
                                <th class="border p-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
