<x-layout title="reports">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-yellow-900">Your Reports</h1>

        @if (session('success'))
            <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ID</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">User</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Time</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $report->id }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $report->user_id }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $report->time }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $report->action }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>
</x-layout>
