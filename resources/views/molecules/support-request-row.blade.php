<tr id="request-{{ $supportRequest->id }}">
    <td class="px-4 py-2 w-24">{{ $supportRequest->name }}</td>
    <td class="px-4 py-2 w-24"><a class="underline" href="mailto:{{ $supportRequest->email }}">{{ $supportRequest->email }}</a></td>
    <td class="px-4 py-2 flex-1 min-w-0">{{ $supportRequest->description }}</td>
    <td class="px-4 py-2 w-36">
        <select
            name="status"
            class="border rounded p-1 w-full appearance-none"
            hx-post="{{ url('support-requests/'.$supportRequest->id.'/update-status') }}"
            hx-include="this"
            hx-target="#request-{{ $supportRequest->id }}"
            hx-swap="outerHTML"
        >
            @foreach (['New', 'In progress', 'Closed'] as $status)
                <option value="{{ $status }}" @selected($supportRequest->status === $status)>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </td>
    <td class="px-4 py-2 text-sm text-gray-600 w-36">{{ $supportRequest->created_at->format('Y-m-d H:i') }}</td>
</tr>
