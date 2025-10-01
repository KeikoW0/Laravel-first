<x-layout>
    <x-slot:judul>Guardian</x-slot:judul>

    <h1 class="text-2xl font-bold mb-4">Data Guardian</h1>

    <div class="overflow-x-auto mt-6">
      <table class="min-w-full border border-gray-300 text-sm text-left">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Pekerjaan</th>
            <th class="border px-4 py-2">Phone</th>
            <th class="border px-4 py-2">Email</th>
            <th class="border px-4 py-2">Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($guardians as $guardian)
            <tr>
              <td class="border px-4 py-2">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2">{{ $guardian->name }}</td>
              <td class="border px-4 py-2">{{ $guardian->job }}</td>
              <td class="border px-4 py-2">{{ $guardian->phone }}</td>
              <td class="border px-4 py-2">{{ $guardian->email }}</td>
              <td class="border px-4 py-2">{{ $guardian->address }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-layout>
