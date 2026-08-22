<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">

                <div class="h-56 bg-gray-100">
                    @if ($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>

                <div class="p-6">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-3 grid grid-cols-3">
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $product->name }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3">
                            <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $product->description ?: '-' }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3">
                            <dt class="text-sm font-medium text-gray-500">Harga</dt>
                            <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3">
                            <dt class="text-sm font-medium text-gray-500">Stok</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $product->stock }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 flex items-center gap-3">
                        <a href="{{ route('products.edit', $product) }}"
                            class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-4 py-2 transition">
                            Edit
                        </a>
                        <a href="{{ route('products.index') }}"
                            class="text-gray-600 hover:text-gray-900 text-sm">
                            Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>