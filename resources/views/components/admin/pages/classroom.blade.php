<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Classroom List</h1>

        <button data-modal-target="addClassroomModal" data-modal-toggle="addClassroomModal"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Classroom
        </button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Class Name</th>
                    <th class="px-6 py-3">Students</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($classroom as $room)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $room->name }}</td>

                    <td class="px-6 py-4">
                        @if ($room->students->count())
                            <ul class="list-disc list-inside">
                                @foreach ($room->students as $student)
                                    <li>{{ $student->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-gray-400 italic">Belum ada siswa</span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <button data-modal-target="editClassroomModal-{{ $room->id }}"
                            data-modal-toggle="editClassroomModal-{{ $room->id }}"
                            class="px-3 py-1.5 text-xs font-medium text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg">
                            ✏️
                        </button>
                    </td>
                </tr>

                {{-- Modal Edit Classroom --}}
                <div id="editClassroomModal-{{ $room->id }}" tabindex="-1"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

                    <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">

                        <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Classroom
                            </h3>
                            <button data-modal-toggle="editClassroomModal-{{ $room->id }}"
                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                                ✕
                            </button>
                        </div>

                        <form action="{{ route('admin.classroom.update', $room->id) }}" method="POST" class="p-1 space-y-4">
                            @csrf
                            @method('PUT')

                            <div class="px-2 pt-1">
                                <label class="block text-sm font-medium">Class Name</label>
                                <input type="text" name="name" value="{{ $room->name }}" required
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
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal Add Classroom --}}
    <div id="addClassroomModal" tabindex="-1"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

        <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Classroom
                </h3>
                <button data-modal-toggle="addClassroomModal"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white">✕</button>
            </div>

            <form action="{{ route('admin.classroom.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Class Name</label>
                    <input type="text" name="name" required
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
