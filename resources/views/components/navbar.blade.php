<nav class="bg-gray-800/50">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center">
        <div class="shrink-0">
          <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
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

      <div class="flex items-center gap-4">
        @auth
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
              Logout
            </button>
          </form>
        @else
          <a href="{{ route('login') }}"
             class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
            Login
          </a>
        @endauth
      </div>

      <div class="-mr-2 flex md:hidden">
        <button type="button" command="--toggle" commandfor="mobile-menu"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 in-aria-expanded:hidden">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 not-in-aria-expanded:hidden">
            <path d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</nav>
