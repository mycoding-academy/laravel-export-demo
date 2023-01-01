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
                    <div class="w-full py-4">
                        <div class="flex w-full justify-end">
                            <div class="input-group m-2">
                            <form action="{{route('customers.index') }}" class="flex items-center">
                                
                                <label for="status_filter" class="px-2 flex-none text-sm font-medium text-gray-900">Status Filter: </label>
                                <select id="status_filter" name="status_filter" class="px-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    @foreach($customerStatuses as $status)
                                    <option value="{{ $status['id'] }}"
                                        @if (request()->status_filter == $status['id'])
                                        selected
                                        @endif
                                        >
                                        {{ $status['name'] }}</option>
                                    @endforeach
                                </select>
                                
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full px-2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="text" name="search" id="simple-search" value="{{ request()->search }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search">
                                </div>
                                <button type="submit" value="{{ request()->search }}" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                            </div>
                            <button type="button" class="justify-self-end ml-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" 
                                onclick="window.location='{{ route('customers.export') }}?status_filter={{ request()->status_filter }}&search={{ request()->search }}'">Export</button>
                        </div>
                    </div>
                    <table class="m-2 py-4 table-auto w-full whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th class="border px-6 py-4" scope="col">ID</th>
                                <th class="border px-6 py-4" scope="col">First Name</th>
                                <th class="border px-6 py-4" scope="col">Last Name</th>
                                <th class="border px-6 py-4" scope="col">Status</th>
                                <th class="border px-6 py-4" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td class="border px-6 py-4" scope="row">{{$customer->id}}</td>
                                <td class="border px-6 py-4" scope="row">{{$customer->first_name}}</td>
                                <td class="border px-6 py-4" scope="row">{{$customer->last_name}}</td>
                                <td class="border px-6 py-4" scope="row">{{$customer->is_active ? 'Active' : 'Not Active'}}</td>
                                <td class="border px-6 py-4" scope="row"> ACTION </td>
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
