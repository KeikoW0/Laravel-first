<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Student List</h1>
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

        <button data-modal-target="addStudentModal" data-modal-toggle="addStudentModal"
            class="absolute right-25 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Student
        </button>
    </form>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Birthday</th>
                    <th class="px-6 py-3">Class</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Address</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800">
                    <td class="px-6 py-4">
                        {{ $students->firstItem() + $loop->index }}
                    </td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4">
                        {{ $student->brithday ? $student->brithday->format('d-m-Y') : '-' }}
                    </td>
                    <td class="px-6 py-4">{{ $student->classroom->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $student->email }}</td>
                    <td class="px-6 py-4">{{ $student->address }}</td>
                    <td class="px-6 py-4 flex gap-2">

                        <button data-modal-target="editStudentModal-{{ $student->id }}"
                                data-modal-toggle="editStudentModal-{{ $student->id }}"
                                class="px-3 py-1.5 bg-yellow-500 text-white rounded">
                            ✏️
                        </button>

                        <form action="{{ route('admin.student.destroy', $student->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1.5 bg-red-600 text-white rounded">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div id="editStudentModal-{{ $student->id }}"
                     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                    <div class="bg-white dark:bg-gray-700 w-full max-w-md rounded-lg p-4">
                        <form action="{{ route('admin.student.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input name="name" value="{{ $student->name }}" class="w-full mb-2 p-2 rounded">
                            <input type="date" name="brithday"
                                   value="{{ $student->brithday?->format('Y-m-d') }}"
                                   class="w-full mb-2 p-2 rounded">
                            <input name="email" value="{{ $student->email }}" class="w-full mb-2 p-2 rounded">
                            <input name="address" value="{{ $student->address }}" class="w-full mb-2 p-2 rounded">

                            <select name="classroom_id" class="w-full mb-3 p-2 rounded">
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ $classroom->id == $student->classroom_id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="w-full bg-yellow-600 text-white py-2 rounded">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $students->links() }}
    </div>

    {{-- Modal Add Student --}}
    <div id="addStudentModal"
         class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white dark:bg-gray-700 w-full max-w-md rounded-lg p-4">
            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf
                <input name="name" placeholder="Name" class="w-full mb-2 p-2 rounded">
                <input type="date" name="brithday" class="w-full mb-2 p-2 rounded">
                <input name="email" placeholder="Email" class="w-full mb-2 p-2 rounded">
                <input name="address" placeholder="Address" class="w-full mb-2 p-2 rounded">

                <select name="classroom_id" class="w-full mb-3 p-2 rounded">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>

                <button class="w-full bg-blue-600 text-white py-2 rounded">
                    Save
                </button>
            </form>
        </div>
    </div>

</x-admin.layout>
