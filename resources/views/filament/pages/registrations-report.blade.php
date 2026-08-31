<x-filament-panels::page>
    @php $registrants = $this->getRegistrants(); @endphp

    @if ($registrants->isEmpty())
        <p class="text-gray-500">No registrations yet.</p>
    @else
        <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 font-medium">Reg. ID</th>
                        <th class="px-4 py-3 font-medium">Type</th>
                        <th class="px-4 py-3 font-medium">Name</th>
                        <th class="px-4 py-3 font-medium">Email</th>
                        <th class="px-4 py-3 font-medium">Organization</th>
                        <th class="px-4 py-3 font-medium">Payment</th>
                        <th class="px-4 py-3 font-medium">Registered</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ($registrants as $registrant)
                        <tr>
                            <td class="px-4 py-3">{{ $registrant['registration_id'] }}</td>
                            <td class="px-4 py-3">{{ $registrant['type'] }}</td>
                            <td class="px-4 py-3">{{ $registrant['name'] }}</td>
                            <td class="px-4 py-3">{{ $registrant['email'] }}</td>
                            <td class="px-4 py-3">{{ $registrant['organization'] }}</td>
                            <td class="px-4 py-3">
                                <span class="{{ $registrant['payment_status'] === 'paid' ? 'text-green-600' : 'text-amber-600' }}">
                                    {{ ucfirst($registrant['payment_status']) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $registrant['registered_at']->format('M j, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</x-filament-panels::page>
