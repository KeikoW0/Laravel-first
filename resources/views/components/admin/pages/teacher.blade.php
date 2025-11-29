<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Teacher List</h1>

        <button data-modal-target="addTeacherModal" data-modal-toggle="addTeacherModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Teacher
        </button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Phone</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($teachers as $teacher)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $teacher->name }}</td>
                        <td class="px-6 py-4">{{ $teacher->subject->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $teacher->email }}</td>
                        <td class="px-6 py-4">{{ $teacher->phone }}</td>
                        <td class="px-6 py-4">{{ $teacher->address }}</td>

                        <td class="px-6 py-4">
                            {{-- Edit Button --}}
                            <button data-modal-target="editTeacherModal-{{ $teacher->id }}"
                                    data-modal-toggle="editTeacherModal-{{ $teacher->id }}"
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg">
                                ✏️
                            </button>

                            {{-- Delete --}}
                            <form action="{{ route('admin.teacher.destroy', $teacher->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus teacher ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal Edit Teacher --}}
                    <div id="editTeacherModal-{{ $teacher->id }}" tabindex="-1"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

                        <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">

                            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Teacher
                                </h3>
                                <button type="button"
                                    data-modal-toggle="editTeacherModal-{{ $teacher->id }}"
                                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white">✕</button>
                            </div>

                            <form action="{{ route('admin.teacher.update', $teacher->id) }}"
                                  method="POST" class="p-1 space-y-4">
                                @csrf
                                @method('PUT')

                                <div class="px-2">
                                    <label class="block text-sm font-medium">Name</label>
                                    <input type="text" name="name" value="{{ $teacher->name }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="block text-sm font-medium">Subject</label>
                                    <select name="subject_id" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                                        <option value="" disabled>Pilih Subject</option>

                                        @foreach ($subjects as $subj)
                                            <option value="{{ $subj->id }}"
                                                {{ $teacher->subject_id == $subj->id ? 'selected' : '' }}>
                                                {{ $subj->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="block text-sm font-medium">Email</label>
                                    <input type="email" name="email" value="{{ $teacher->email }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="block text-sm font-medium">Phone Number</label>
                                    <input type="text" name="phone" value="{{ $teacher->phone }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                                </div>

                                <div class="px-2 pt-1">
                                    <label class="block text-sm font-medium">Address</label>
                                    <input type="text" name="address" value="{{ $teacher->address }}" required
                                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
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

                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data teacher.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Teacher --}}
    <div id="addTeacherModal" tabindex="-1"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

        <div class="relative w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Teacher</h3>
                <button type="button" data-modal-toggle="addTeacherModal"
                        class="text-gray-400 hover:text-gray-900 dark:hover:text-white">✕</button>
            </div>

            <form action="{{ route('admin.teacher.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required
                           class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Subject</label>
                    <select name="subject_id" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                        <option value="" disabled selected>Pilih Subject</option>

                        @foreach ($subjects as $subj)
                            <option value="{{ $subj->id }}">{{ $subj->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required
                           class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Phone Number</label>
                    <input type="text" name="phone" required
                           class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Address</label>
                    <input type="text" name="address" required
                           class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <button type="submit"
                        class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Save
                </button>
            </form>

        </div>
    </div>

</x-admin.layout>
