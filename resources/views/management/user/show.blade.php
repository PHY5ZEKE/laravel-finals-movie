<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-blue-500 mb-4">User Details</h2>
                <div class="flex flex-col gap-y-4">
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Name: {{ $user->name }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Email: {{ $user->email }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Role: {{ $user->role }}</p>
                    </div>
                </div>
                <div class="mt-6 flex gap-x-4">
                    <a href="{{ route('management.user.edit', $user->user_id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <form action="{{ route('management.user.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
                <div class="mt-6">
                    <a href="{{ route('management.user.index') }}" class="text-blue-500 hover:underline">Back to Users List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>