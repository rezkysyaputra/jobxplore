 <nav class="flex justify-between items-center my-8">
     <ul>
         <li>
             <a href="{{ route('jobs.index') }}" class="text-2xl font-bold">
                 JobXplore
             </a>
         </li>
     </ul>

     <ul class="flex gap-4 text-md font-semibold">
         @auth
         <li>
             <x-link href="{{ route('my-jobs.index') }}">
                 My Jobs
             </x-link>
         </li>
         <li>
             <x-link href="{{ route('my-job-application.index') }}">
                 Applications
             </x-link>
         </li>
         @endauth
     </ul>

     <ul class="flex gap-4 items-center text-md font-semibold">
         @auth
         <li class="relative" x-data="{ open: false }">
             <button type="button" @click="open = !open" class="flex text-sm  rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                 <span class="sr-only">Open user menu</span>
                 <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                     <span class="font-medium text-gray-600 dark:text-gray-300">
                         {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->name, strpos(auth()->user()->name, ' ') + 1, 1) ?? '') }}
                     </span>
                 </div>
             </button>
             <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 z-50 text-base list-none bg-slate-50 border divide-y divide-gray-100 rounded-lg shadow-md dark:bg-gray-700 dark:divide-gray-600" style="display: none;">
                 <div class="px-4 py-3">
                     <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                     <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                 </div>
                 <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
                     <li>
                         <form action="{{ route('auth.destroy') }}" method="post">
                             @csrf
                             @method('delete')
                             <button class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-2   00 dark:hover:text-white">
                                 Sign out
                             </button>
                         </form>
                     </li>
                 </ul>
             </div>
         </li>
         @else
         <li class="flex gap-2 text-lg">
             <x-link href="{{ route('auth.create') }}">
                 Sign in
             </x-link>
             <span>/</span>
             <x-link :href="route('register.create')">
                 Sign up
             </x-link>
         </li>
         @endauth
     </ul>
 </nav>
