<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-600 mb-4">Users</h2>
            <hr>
            </br>
                <form id="search-form" class="space-y-4" action="{{ route('management.user.index') }}" method="GET">
                    <input type="text" name="search" id="search"
                        class="w-full border-2 border-neutral-700 focus:border-red-600 focus:ring-red-500 rounded-lg shadow-sm"
                        placeholder="Search for users"value="">
                </form>

                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($users as $user)
                        <li class="flex justify-between gap-x-6 py-5 border-b-[1]  border-gray-200">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <a href="{{ route('management.user.show', $user->user_id) }}"
                                        class="text-sm font-semibold leading-6 text-neutral-400 hover:underline">
                                        {{ $user->name }}
                                    </a>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-red-600">{{ $user->role }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
