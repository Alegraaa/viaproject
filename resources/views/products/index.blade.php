<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Product') }}
            </h2>
            @role('admin')
                <a href="{{ route('products.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 transition">
                    + Tambah Product
                </a>
            @endrole
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($products->isEmpty())
                <div class="bg-white rounded-xl border border-gray-100 p-12 text-center text-gray-500">
                    Belum ada product. <a href="{{ route('products.create') }}" class="text-blue-600 hover:underline">Tambah product pertama</a>.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition">
                            <div class="h-72 bg-gray-100">
                                @if ($product->getFirstMediaUrl('images'))
                                    <img src="{{ $product->getFirstMediaUrl('images') }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                                        Tidak ada gambar
                                    </div>
                                @endif
                            </div>

                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 truncate">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $product->description ?: '-' }}</p>

                                <div class="flex items-center justify-between mt-3">
                                    <span class="font-semibold text-blue-700">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    <span class="text-xs text-gray-500">Stok: {{ $product->stock }}</span>
                                </div>

                                <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-100">
                                    <a href="{{ route('products.show', $product) }}" class="text-sm text-blue-600 hover:underline">Lihat</a>
                                    @role('admin')
                                        <a href="{{ route('products.edit', $product) }}" class="text-sm text-yellow-600 hover:underline">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus product ini?')" class="ml-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>