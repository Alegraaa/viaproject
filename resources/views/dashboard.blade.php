<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 sm:grid-rows-2 sm:grid-flow-col gap-6">

                <x-stat-card label="Total Product" :value="$stats['total_products']" color="blue">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card label="Total Stok" :value="$stats['total_stock']" color="green">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6.75-3v-.75a2.25 2.25 0 012.25-2.25h0a2.25 2.25 0 012.25 2.25v.75m-9 0h9" />
                        </svg>
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card label="Total Order" :value="$stats['total_orders']" color="purple">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 1.907-4.706 2.35-7.201.078-.442-.269-.799-.72-.799H4.5m0 0L4.5 3m3 18a1.5 1.5 0 01-3 0 1.5 1.5 0 013 0zm12 0a1.5 1.5 0 01-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </x-slot:icon>
                </x-stat-card>

                <x-stat-card label="Total Pendapatan" :value="'Rp ' . number_format($stats['total_revenue'], 0, ',', '.')" color="orange">
                    <x-slot:icon>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </x-slot:icon>
                </x-stat-card>

            </div>

        </div>
    </div>
</x-app-layout>