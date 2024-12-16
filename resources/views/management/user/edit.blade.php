<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-800 border-2 border-neutral-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-bold text-2xl text-red-600 mb-4">Edit User</h2>
                <form action="{{ route('management.user.update', $user->user_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-neutral-400">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <x-form-error name="name" />
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-neutral-400">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <x-form-error name="email" />
                        </div>
                        <div>
                            <label for="role" class="block text-sm font-medium text-neutral-400">Role</label>
                            <select name="role" id="role"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option selected disabled>Select A Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="employee">Employee</option>
                            </select>
                            <x-form-error name="role" />
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('management.user.index') }}">
                            <button type="button"
                                class="mt-5 px-5 py-2 bg-neutral-600 text-neutral-300 rounded-lg font-semibold hover:bg-neutral-700">Cancel</button>
                        </a>

                        <button type="submit"
                            class="mt-5 px-5 py-2 bg-red-600 text-neutral-300 rounded-lg font-semibold hover:bg-red-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
