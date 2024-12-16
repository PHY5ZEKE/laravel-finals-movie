<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-600 mb-4">User Details</h2>
                <div class="flex flex-col gap-y-4">
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-neutral-400">Name: {{ $user->name }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-neutral-400">Email: {{ $user->email }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-neutral-400">Role: {{ $user->role }}</p>
                    </div>
                </div>
                <div class="mt-6 flex gap-x-4">
                    <a href="{{ route('management.user.edit', $user->user_id) }}"
                        class="px-5 py-2 bg-neutral-600 text-neutral-300 rounded-lg font-semibold hover:bg-neutral-700">
                        Edit
                    </a>
                    <form action="{{ route('management.user.destroy', $user->user_id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
                <div class="mt-6">
                    <a href="{{ route('management.user.index') }}" class="text-red-600 hover:text-red-700">Back to Users
                        List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
