<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h2 class="text-2xl font-semibold leading-tight text-red-600">Audit Logs</h2>
                <div class="mt-4">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="min-w-full py-2 align-middle inline-block">
                                <div
                                    class="shadow overflow-hidden border-b bg-neutral-800 border-2 border-neutral-700 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-neutral-800">
                                        <thead class="bg-neutral-700">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-neutral-300 uppercase tracking-wider">
                                                    User
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-neutral-300 uppercase tracking-wider">
                                                    Action
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-neutral-300 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-neutral-300 uppercase tracking-wider">
                                                    Timestamp
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-neutral-700 divide-y divide-neutral-800">
                                            @foreach ($logs as $log)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-neutral-400">
                                                            {{ $log->user->name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-neutral-400">{{ $log->action }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-neutral-400">{{ $log->description }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-neutral-400">
                                                        {{ $log->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="px-6 py-3">
                                        {{ $logs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
