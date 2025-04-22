<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 text-green-600">{{ session('success') }}</div>
                    @endif
                    <table class=" w-full table-auto border-collapse">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Description</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-left">Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($supportRequests as $request)
                            @include('molecules.support-request-row', ['supportRequest' => $request])
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No support requests found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-6">
                        {{ $supportRequests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
