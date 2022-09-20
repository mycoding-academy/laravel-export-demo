<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full bg-sky-300 py-4">
                        <div class="flex w-full justify-end">
                            <div class="input-group m-2">
                            <form action="{{route('customers.index') }}">
                                <input type="text" name="search" value="{{ request()->search }}" placeholder="search by first name or last name" />
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                                    <span class="fas fa-search"> Search </span>
                                </button>
                            </form>
                            </div>
                            <button type="button" class="justify-self-end ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                                onclick="window.location='{{ route('customers.export') }}?search={{ request()->search }}'">Export</button>
                        </div>
                    </div>
                    <table class="m-2 py-4 table-auto w-full whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4">#</th>
                                <th class="border px-6 py-4">First Name</th>
                                <th class="border px-6 py-4">Last Name</th>
                                <th class="border px-6 py-4">Status</th>
                                <th class="border px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td class="border px-6 py-4">{{$customer->id}}</td>
                                <td class="border px-6 py-4">{{$customer->first_name}}</td>
                                <td class="border px-6 py-4">{{$customer->last_name}}</td>
                                <td class="border px-6 py-4">{{$customer->is_active ? 'Active' : 'Not Active'}}</td>
                                <td class="border px-6 py-4"> ACTION </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
