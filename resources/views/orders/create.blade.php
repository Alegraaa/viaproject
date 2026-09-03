<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Order Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8 border border-gray-100">

                @if ($errors->any())
                    <div class="mb-4 p-4 text-sm text-red-800 bg-red-100 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pemesan</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Pilih Product</label>

                        <div id="item-list" class="space-y-3">
                            <div class="flex gap-3 item-row">
                                <select name="items[0][product_id]" class="bg-gray-50 border border-gray-300 text-sm rounded-lg p-2.5 flex-1">
                                    <option value="">-- Pilih Product --</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }}, Rp {{ number_format($product->price, 0, ',', '.') }})</option>
                                    @endforeach
                                </select>
                                <input type="number" name="items[0][quantity]" min="1" value="1" placeholder="Qty"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg p-2.5 w-24">
                            </div>
                        </div>

                        <button type="button" id="add-item" class="mt-3 text-sm text-blue-600 hover:underline">
                            + Tambah Product Lain
                        </button>
                    </div>

                    <div class="flex items-center gap-3 mt-6">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                            Buat Order
                        </button>
                        <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        let itemIndex = 1;
        document.getElementById('add-item').addEventListener('click', function () {
            const list = document.getElementById('item-list');
            const row = list.children[0].cloneNode(true);

            row.querySelectorAll('select, input').forEach(el => {
                el.name = el.name.replace(/\[\d+\]/, '[' + itemIndex + ']');
                if (el.tagName === 'SELECT') el.value = '';
                if (el.tagName === 'INPUT') el.value = 1;
            });

            list.appendChild(row);
            itemIndex++;
        });
    </script>
</x-app-layout>