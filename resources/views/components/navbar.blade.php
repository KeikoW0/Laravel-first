<nav class="bg-gray-800/50">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">

      {{-- LEFT --}}
      <div class="flex items-center">
        <div class="shrink-0">
          <img
            src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
            alt="Logo"
            class="size-8"
          />
        </div>

        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <x-nav-link href="{{ url('/home') }}" :active="request()->is('home')">Home</x-nav-link>
            <x-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">Contact</x-nav-link>
            <x-nav-link href="{{ url('/profile') }}" :active="request()->is('profile')">Profile</x-nav-link>
            <x-nav-link href="{{ url('/student') }}" :active="request()->is('student')">Student</x-nav-link>
            <x-nav-link href="{{ url('/guardians') }}" :active="request()->is('guardians')">Guardian</x-nav-link>
            <x-nav-link href="{{ url('/classrooms') }}" :active="request()->is('classrooms')">Classroom</x-nav-link>
            <x-nav-link href="{{ url('/teachers') }}" :active="request()->is('teachers')">Teacher</x-nav-link>
            <x-nav-link href="{{ url('/subjects') }}" :active="request()->is('subjects')">Subject</x-nav-link>
          </div>
        </div>
      </div>

      {{-- RIGHT --}}
      <div class="flex items-center gap-4">
        @auth
          <div class="relative group">
            <button
              class="flex items-center gap-2 rounded-md bg-gray-700 px-4 py-2 text-sm text-white hover:bg-gray-600">
              {{ Auth::user()->name }}
              <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                   viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            {{-- DROPDOWN --}}
            <div
              class="absolute right-0 z-50 mt-2 w-44 rounded-md bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">

              <a href="{{ route('admin.dashboard') }}"
                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Dashboard
              </a>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                  type="submit"
                  class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                  Logout
                </button>
              </form>
            </div>
          </div>
        @else
          <a href="{{ route('login') }}"
             class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
            Login
          </a>
        @endauth
      </div>

    </div>
  </div>
</nav>
