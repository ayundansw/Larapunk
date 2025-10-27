<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Items</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('items.create') }}" class="bg-blue-600 text-black px-4 py-2 rounded">Add Item</a>
            </div>

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->category->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($item->description, 80) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('items.edit', $item) }}" class="text-blue-600 mr-4">Edit</a>
                                <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus item ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada item</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>