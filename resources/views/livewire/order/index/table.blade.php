<div class="w-full flex flex-col gap-8">
    <x-order.index.bulk-action></x-order.index.bulk-action>

    <div class="flex gap-2 justify-end col-span-5">
        <div class="flex">
            <input wire:model.live.debounce.500="search" type="text" placeholder="Search"/>
        </div>
    </div>
    <div class="flex gap-2 justify-end col-span-5">
        <div class="flex">
            <form wire:submit="export">
                <button type="submit" class="flex items-center gap-2 rounded-lg">
                    <x-icon.arrow-down-tray wire:loading.remove wire:target />
                    <x-icon.spinner wire:loading wire:target />
                    Export
                </button>
            </form>
        </div>
    </div>
    <div class="relative overflow-x-auto">
        {{-- Orders table... --}}
        <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-800">
            <thead>
            <tr>
                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div class="flex items-center">
                         <x-order.index.check-all />
                    </div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <x-order.index.sortable column="number" :$sortCol :$sortAsc>
                            <div class="whitespace-nowrap">Order #</div>
                    </x-order.index.sortable>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                   <x-order.index.sortable column="status" :$sortCol :$sortAsc>
                       <div>Status</div>
                   </x-order.index.sortable>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    <div>Customer</div>
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    {{--                <x-order.index.sortable column="date" :$sortCol :$sortAsc>--}}
                    <div>Date</div>
                    {{--                </x-order.index.sortable>--}}
                </th>

                <th class="p-3 text-left text-sm font-semibold text-gray-900">
                    {{--                <x-order.index.sortable column="amount" :$sortCol :$sortAsc class="flex-row-reverse">--}}
                    <div>Amount</div>
                    {{--                </x-order.index.sortable>--}}
                </th>

                <th>
                    {{-- Dropdown menus... --}}
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white text-gray-700">
            @foreach ($orders as $order)
                <tr wire:key="{{ $order->id }}">
                    <td class="whitespace-nowrap p-3 text-sm">
                        @json($selectedOrderIds)
                        <div class="flex items-center">
                            <input wire:model.live="selectedOrderIds" value="{{ $order->id }}" type="checkbox" class="rounded border-gray-300 shadow">
                        </div>
                    </td>

                    <td class="whitespace-nowrap p-3 text-sm">
                        <div class="flex gap-1">
                            <span class="text-gray-300">#</span>

                            {{ $order->number }}
                        </div>
                    </td>

                    <td class="whitespace-nowrap p-3 text-sm">
                        <div class="rounded-full py-0.5 pl-2 pr-1 inline-flex font-medium items-center gap-1 text-red-600 text-xs bg-red-100 opacity-75">
                            <div>{{ $order->status }}</div>

                            {{--                        <x-dynamic-component :component="$order->status" />--}}
                        </div>
                    </td>

                    <td class="whitespace-nowrap p-3 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-5 h-5 rounded-full overflow-hidden">
                                <img src="{{ $order->avatar }}" alt="Customer avatar">
                            </div>

                            <div>{{ $order->email }}</div>
                        </div>
                    </td>

                    <td class="whitespace-nowrap p-3 text-sm">
                        {{--                    {{ $order->dateForHumans() }}--}}
                    </td>

                    <td class="w-auto whitespace-nowrap p-3 text-sm text-gray-800 font-semibold text-right">
                        {{--                    {{ $order->amountForHumans() }}--}}
                    </td>

                    <td class="whitespace-nowrap p-3 text-sm">
                        <div class="flex items-center justify-end">
                            <x-order.index.row-dropdown :$order />
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div wire:loading wire:target="sortBy, search">

        </div>
        {{ $orders->links() }}

        {{-- Table loading spinners... --}}
        <div wire:loading wire:target="sortBy, search, nextPage, previousPage, archive, archiveSelected" class="absolute inset-0 bg-white opacity-50">
            {{--  --}}
        </div>

        <div wire:loading.flex wire:target="sortBy, search, nextPage, previousPage, archive, archiveSelected" class="flex justify-center items-center absolute inset-0">
            <x-icon.spinner size="10" class="text-gray-500" />
        </div>
    </div>
</div>


