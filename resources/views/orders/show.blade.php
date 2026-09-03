<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">

                <dl class="divide-y divide-gray-200 mb-6">
                    <div class="py-3 grid grid-cols-3">
                        <dt class="text-sm font-medium text-gray-500">Pemesan</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ $order->customer_name }}</dd>
                    </div>
                    <div class="py-3 grid grid-cols-3">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="text-sm text-gray-900 col-span-2">{{ ucfirst($order->status) }}</dd>
                    </div>
                    <div class="py-3 grid grid-cols-3">
                        <dt class="text-sm font-medium text-gray-500">Total</dt>
                        <dd class="text-sm text-gray-900 col-span-2 font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</dd>
                    </div>
                </dl>

                <h3 class="font-semibold text-gray-900 mb-3">Item Order</h3>
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-2">Product</th>
                            <th class="px-4 py-2">Qty</th>
                            <th class="px-4 py-2">Harga Satuan</th>
                            <th class="px-4 py-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $item->product->name }}</td>
                                <td class="px-4 py-2">{{ $item->quantity }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('orders.index') }}" class="inline-block mt-6 text-gray-600 hover:text-gray-900 text-sm">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-app-layout>