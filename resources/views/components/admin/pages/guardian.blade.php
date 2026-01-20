<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Guardian List</h1>
    </div>

    {{-- Search --}}
    <form method="GET" class="mb-4 flex gap-2">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search name, email, class..."
               class="w-full md:w-1/3 p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">

        <button class="px-4 py-2 bg-gray-800 text-white rounded-lg">Search</button>

        @if(request('search'))
            <a href="{{ url()->current() }}"
               class="px-4 py-3 bg-gray-800 text-white rounded-lg">
                ❌
            </a>
        @endif

        <button data-modal-target="addGuardianModal" data-modal-toggle="addGuardianModal"
            class="absolute right-25 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Guardian
        </button>
    </form>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Job</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardians as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->name }}</td>
                        <td class="px-6 py-4">{{ $item->job }}</td>
                        <td class="px-6 py-4">{{ $item->phone }}</td>
                        <td class="px-6 py-4">{{ $item->email }}</td>
                        <td class="px-6 py-4">{{ $item->address }}</td>

                        <td class="px-6 py-4 flex gap-2">
                            {{-- EDIT --}}
                            <button data-modal-target="editGuardianModal-{{ $item->id }}"
                                data-modal-toggle="editGuardianModal-{{ $item->id }}"
                                class="px-3 py-1.5 bg-yellow-500 text-white rounded-lg">
                                ✏️
                            </button>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.guardian.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Delete this guardian?')" >
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1.5 bg-red-600 text-white rounded-lg">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- EDIT MODAL --}}
                    <div id="editGuardianModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 overflow-y-auto">

                        <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex justify-between items-center p-4 border-b dark:border-gray-600">
                                <h3 class="text-lg font-semibold">Edit Guardian</h3>
                                <button data-modal-toggle="editGuardianModal-{{ $item->id }}">✕</button>
                            </div>

                            <form action="{{ route('admin.guardian.update', $item->id) }}" method="POST" class="p-1 space-y-4">
                                @csrf
                                @method('PUT')

                                <div class="px-2">
                                    <label class="text-sm font-medium">Name</label>
                                    <input type="text" name="name" value="{{ $item->name }}"
                                        class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="text-sm font-medium">Job</label>
                                    <input type="text" name="job" value="{{ $item->job }}"
                                        class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="text-sm font-medium">Phone</label>
                                    <input type="text" name="phone" value="{{ $item->phone }}"
                                        class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="text-sm font-medium">Email</label>
                                    <input type="email" name="email" value="{{ $item->email }}"
                                        class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" required>
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="text-sm font-medium">Address</label>
                                    <textarea name="address" rows="3"
                                        class="w-full p-2 border rounded-lg dark:bg-gray-600 dark:text-white" required>{{ $item->address }}</textarea>
                                </div>

                                <div class="pt-6">
                                <button type="submit"
                                    class="w-full py-2.5 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">
                                    Update
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>

                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $guardians->links() }}
    </div>

    {{-- ADD MODAL --}}
    <div id="addGuardianModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold">Add Guardian</h3>
                <button data-modal-toggle="addGuardianModal">✕</button>
            </div>

            <form action="{{ route('admin.guardian.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Job</label>
                    <input type="text" name="job" required class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Phone</label>
                    <input type="text" name="phone" required class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Address</label>
                    <textarea name="address" rows="3" required class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600"></textarea>
                </div>

                <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg">Save</button>
            </form>
        </div>
    </div>

</x-admin.layout>
