<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Nuevo Proyecto</h2>

                    <!-- Formulario -->
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Título</label>
                            <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-md p-2">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Descripción</label>
                            <textarea id="description" name="description" class="w-full border-gray-300 rounded-md p-2"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="url" class="block text-gray-700">URL del Proyecto</label>
                            <input type="text" id="url" name="url" class="w-full border-gray-300 rounded-md p-2">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">Imagen</label>
                            <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-md p-2">
                        </div>

                        <div class="flex justify-end">
                            <button type="button" @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancelar</button>
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Guardar</button>
                        </div>
                    </form>

                    <!-- Lista de Proyectos -->
                    <h3 class="text-lg font-semibold mt-8 mb-4">Proyectos Registrados</h3>

                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Título</th>
                                <th class="border p-2">Descripción</th>
                                <th class="border p-2">URL</th>
                                <th class="border p-2">Imagen</th>
                                <th class="border p-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr class="border">
                                    <td class="border p-2">{{ $project->title }}</td>
                                    <td class="border p-2">{{ $project->description }}</td>
                                    <td class="border p-2"><a href="{{ $project->url }}" target="_blank" class="text-blue-500">{{ $project->url }}</a></td>
                                    <td class="border p-2">
                                        @if ($project->image)
                                            <img src="{{ asset('storage/' . $project->image) }}" width="100">
                                        @endif
                                    </td>
                                    <td class="border p-2">
                                        <a href="{{ route('projects.edit', $project) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
