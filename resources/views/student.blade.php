<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full border border-gray-300 text-sm text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Birthday</th>
            <th class="border px-4 py-2">Kelas</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr>
              <td class="border px-4 py-2">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2">{{ $student['name'] }}</td>
              <td class="border px-4 py-2">{{ $student['brithday'] }}</td>
              <td class="border px-4 py-2">{{ $student->classroom->name }}</td>
              <td class="border px-4 py-2">{{ $student['email'] }}</td>
              <td class="border px-4 py-2">{{ $student['address'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-layout>
