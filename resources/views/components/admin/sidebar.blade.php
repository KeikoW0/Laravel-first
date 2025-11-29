<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full 
              bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">

        <ul class="space-y-2 font-medium">

            {{-- Dashboard --}}
            <li>
                <a href="/admin/dashboard"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 
                          dark:hover:bg-gray-700 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 
                                group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 
                                 8.5 8.5 0 1 0 9.039 9.039 
                                 .999.999 0 0 0-.998-1.066h-.001Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 
                                 1.02V10h8.975a1 1 0 0 0 
                                 .993-.935c.013-.188.032-.374.032-.565A8.51 
                                 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>

            {{-- Pages Dropdown --}}
            <li>
                <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg 
                               group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 
                                group-hover:text-gray-900 dark:group-hover:text-white"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M4 4h12v2H4V4zM4 9h12v2H4V9zm0 5h12v2H4v-2z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">School Data</span>
                    <svg class="w-3 h-3 ml-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <ul id="dropdown-pages" class="hidden py-2 space-y-1">

                    {{-- Students --}}
                    <li>
                        <a href="/admin/students"
                           class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-150 
                                  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <span class="ml-3">Students</span>
                        </a>
                    </li>

                    {{-- Guardians --}}
                    <li>
                        <a href="/admin/guardians"
                           class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-150 
                                  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <span class="ml-3">Guardians</span>
                        </a>
                    </li>

                    {{-- Classrooms --}}
                    <li>
                        <a href="/admin/classrooms"
                           class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-150 
                                  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <span class="ml-3">Classrooms</span>
                        </a>
                    </li>

                    {{-- Teachers --}}
                    <li>
                        <a href="/admin/teachers"
                           class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-150 
                                  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <span class="ml-3">Teachers</span>
                        </a>
                    </li>

                    {{-- Subjects --}}
                    <li>
                        <a href="/admin/subjects"
                           class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-150 
                                  hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <span class="ml-3">Subjects</span>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>

        {{-- Contact & Profile --}}
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                @include('components.admin.sidelink', [
                    'title' => 'Contact',
                    'link' => '/admin/kontak',
                    'svg' => '<svg width="26px" height="26px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd"
                                d="M17.7071 13.2929L16.0208 14.9792C15.545 15.455 14.7655 15.5268 14.2098 15.1472C12.8261 14.2014 11.7986 13.1739 10.8528 11.7902C10.4732 11.2345 10.545 10.455 11.0208 9.97918L12.7071 8.29289C13.6973 7.30272 13.7403 5.7093 12.8052 4.66813L11.5 3.18934C10.3954 1.95083 8.48815 1.79198 7.18934 2.81066L5.75 4.06066C4.51184 5.04303 3.78855 6.54393 3.86852 8.08235C4.04488 11.1723 5.37157 14.4095 8.4 17.4379C11.4284 20.4664 14.6656 21.7931 17.7555 21.9694C19.294 22.0494 20.795 21.3261 21.7774 20.0879L23.0274 18.6486C24.0461 17.3498 23.8872 15.4425 22.6487 14.3379L21.1699 13.0327C20.1288 12.0976 18.5353 12.1406 17.5452 13.1308L17.7071 13.2929Z"
                                fill="currentColor"/></svg>',
                ])
            </li>
            <li>
                @include('components.admin.sidelink', [
                    'title' => 'Profile',
                    'link' => '/admin/profil',
                    'svg' => '<svg width="26px" height="26px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4ZM6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8ZM8.00873 16C5.23898 16 3 18.2386 3 21.0082C3 21.5567 3.44405 22 3.99262 22H20.0074C20.556 22 21 21.5567 21 21.0082C21 18.2386 18.761 16 15.9913 16H8.00873Z"
                                fill="currentColor"/></svg>',
                ])
            </li>
        </ul>
    </div>
</aside>
