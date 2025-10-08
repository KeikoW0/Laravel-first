<x-layout>
    <x-slot:judul>{{ $title }}</x-slot:judul>

    <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full border border-gray-300 text-sm text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Description</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($subjects as $subject)
            <tr>
              <td class="border px-4 py-2">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2">{{ $subject['name'] }}</td>
              <td class="border px-4 py-2">{{ $subject['description']}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-layout>
