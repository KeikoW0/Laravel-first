<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

<section class="min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-white rounded-lg shadow dark:bg-gray-800">
      <div class="p-6 space-y-6">
          <h1 class="text-xl font-bold text-gray-900 dark:text-white">
              Sign in to your account
          </h1>

          <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
              @csrf

              <div>
                  <label class="block text-sm text-gray-700 dark:text-gray-300">Email</label>
                  <input type="email" name="email" required
                         class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
              </div>

              <div>
                  <label class="block text-sm text-gray-700 dark:text-gray-300">Password</label>
                  <input type="password" name="password" required
                         class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
              </div>

              <div class="flex items-center gap-2">
                  <input type="checkbox" name="remember">
                  <span class="text-sm text-gray-600 dark:text-gray-400">Remember me</span>
              </div>

              <button type="submit"
                      class="w-full py-2 text-white bg-indigo-600 rounded hover:bg-indigo-700">
                  Sign In
              </button>
          </form>
      </div>
  </div>
</section>

</body>
</html>
