<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 text-green-600">{{ session('success') }}</div>
                    @endif

                    <h3 class="text-lg font-bold mb-4">Support Requests</h3>
                    @forelse($supportRequests as $request)
                        <div class="mb-4 border-b pb-2">
                            <strong>{{ $request->name }}</strong> ({{ $request->email }})<br>
                            <span
                                class="text-sm text-gray-600">{{ $request->created_at->format('Y-m-d H:i') }}</span><br>
                            <span class="text-sm text-blue-600">Status: {{ ucfirst($request->status) }}</span><br>
                            {{ $request->description }}
                        </div>
                    @empty
                        <p>No support requests found.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
