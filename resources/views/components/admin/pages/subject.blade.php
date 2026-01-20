<x-admin.layout :title="$title">

    <div class="flex justify-between items-center mt-10 mb-6"> 
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Subject List</h1>
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

        <button data-modal-target="addSubjectModal" data-modal-toggle="addSubjectModal"
            class="absolute right-25 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            + Add Subject
        </button>
    </form>

    {{-- Table --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Subject Name</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6 py-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($subjects as $subj)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $subj->name }}</td>
                    <td class="px-6 py-4">{{ $subj->description }}</td>

                    <td class="px-6 py-4">
                        <button data-modal-target="editSubjectModal-{{ $subj->id }}"
                            data-modal-toggle="editSubjectModal-{{ $subj->id }}"
                            class="px-3 py-1.5 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            ✏️
                        </button>
                    </td>
                </tr>

                {{-- Modal Edit --}}
                <div id="editSubjectModal-{{ $subj->id }}" tabindex="-1"
                    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

                    <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Subject
                            </h3>
                            <button data-modal-toggle="editSubjectModal-{{ $subj->id }}"
                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white">✕</button>
                        </div>

                        <form action="{{ route('admin.subject.update', $subj->id) }}" method="POST" class="p-1 space-y-4">
                            @csrf
                            @method('PUT')

                            <div class="px-2 pt-1">
                                <label class="block text-sm font-medium">Subject Name</label>
                                <input type="text" name="name" value="{{ $subj->name }}" required
                                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                            </div>

                            <div class="px-2 pt-1">
                                <label class="block text-sm font-medium">Description</label>
                                <textarea name="description" rows="3"
                                    class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">{{ $subj->description }}</textarea>
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
        {{ $subjects->links() }}
    </div>

    {{-- Modal Add --}}
    <div id="addSubjectModal" tabindex="-1"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full p-4 bg-black/50">

        <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-700">

            <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add Subject</h3>
                <button data-modal-toggle="addSubjectModal"
                    class="text-gray-400 hover:text-gray-900 dark:hover:text-white">✕</button>
            </div>

            <form action="{{ route('admin.subject.store') }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Subject Name</label>
                    <input type="text" name="name" required
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full p-2.5 border rounded-lg bg-gray-50 dark:bg-gray-600"></textarea>
                </div>

                <button type="submit"
                    class="w-full py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Save
                </button>
            </form>
        </div>
    </div>

</x-admin.layout>
