<x-admin.layout :title="$title">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 border border-gray-200 dark:border-gray-700 w-full max-w-md text-center">

            <!-- Judul -->
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Kontak</h1>

            <!-- Kontak Card -->
            <div class="space-y-4 text-left">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <span class="font-semibold text-gray-700 dark:text-gray-200">Email</span>
                    <span class="text-gray-900 dark:text-white">{{ $email }}</span>
                </div>

                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <span class="font-semibold text-gray-700 dark:text-gray-200">Phone Number</span>
                    <span class="text-gray-900 dark:text-white">{{ $whatsapp }}</span>
                </div>
            </div>

        </div>
    </div>
</x-admin.layout>