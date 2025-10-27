<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Categories</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('categories.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded">Add Category</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <!-- Ubah header tabel di sini -->
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Items</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Ubah tampilan data di sini -->
                        @forelse($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $category->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $category->items->count() ?? 0 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 mr-4">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada kategori</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>