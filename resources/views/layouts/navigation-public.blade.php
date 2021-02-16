<div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
    <div class="relative flex grid items-center grid-cols-2 lg:grid-cols-3">
        <ul class="flex items-center hidden space-x-8 lg:flex">
            <li class="flex justify-center inline-block">
                <div>
                    <a href="/" aria-label="Our product" title="Our product"
                       class="relative font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-red-400 hover:underline">Blog</a>
                </div>
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen"
                            class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                        <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false"
                         class="fixed inset-0 h-full w-full z-10"></div>

                    <div x-show="dropdownOpen"
                         class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        @foreach($categories as $category)
                            <a class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                               href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div>

            </li>

            <li><a href="/" aria-label="Our product" title="Our product"
                   class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-red-400 hover:underline">Portfolio</a>
            </li>
            <li><a href="/" aria-label="Product pricing" title="Product pricing"
                   class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-red-400 hover:underline">CV</a>
            </li>
            <li><a href="/" aria-label="Product pricing" title="Product pricing"
                   class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-red-400 hover:underline">Contact</a>
            </li>
        </ul>
        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center lg:mx-auto">
            <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2"
                 stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                <rect x="3" y="1" width="7" height="12"></rect>
                <rect x="3" y="17" width="7" height="6"></rect>
                <rect x="14" y="1" width="7" height="6"></rect>
                <rect x="14" y="11" width="7" height="12"></rect>
            </svg>
            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Matt-Lab</span>
        </a>
        <ul class="flex items-center hidden ml-auto space-x-8 lg:flex">

{{--            <div class="">--}}
{{--                <div class="relative"> <input type="text" class="h-14 w-75 pr-8 pl-5 rounded z-0 focus:shadow focus:outline-none" placeholder="Recherche...">--}}
{{--                    <div class="absolute top-4 right-3"> <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i> </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <form role="search" method="get" class="s-header__search-form" action="{{ Route('posts.search') }}">
                <label>
                    <input id="search" type="search" name="search" class="s-header__search-field" placeholder="@lang('Recherche...')" title="@lang('Search for:')" autocomplete="off">
                </label>
{{--                <input type="submit" class="s-header__search-submit" value="Search">--}}
            </form>

            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}" aria-label="Sign in" title="Sign in"
                           class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Dashboard</a>
                    </li>
                @else
                    <li><a href="{{ route ('login') }}" aria-label="Sign in" title="Sign in"
                           class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Se
                            connecter</a>
                    </li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" aria-label="Sign up" title="Sign up"
                               class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Créer
                                un compte</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
        <!-- Mobile menu -->
        <div class="ml-auto lg:hidden">
            <button aria-label="Open Menu" title="Open Menu"
                    class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50">
                <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                    <path fill="currentColor"
                          d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                    <path fill="currentColor"
                          d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                </svg>
            </button>
            <!-- Mobile menu dropdown
            <div class="absolute top-0 left-0 w-full">
              <div class="p-5 bg-white border rounded shadow-sm">
                <div class="flex items-center justify-between mb-4">
                  <div>
                    <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                      <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                        <rect x="3" y="1" width="7" height="12"></rect>
                        <rect x="3" y="17" width="7" height="6"></rect>
                        <rect x="14" y="1" width="7" height="6"></rect>
                        <rect x="14" y="11" width="7" height="12"></rect>
                      </svg>
                      <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Company</span>
                    </a>
                  </div>
                  <div>
                    <button aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                      <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path
                          fill="currentColor"
                          d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <nav>
                  <ul class="space-y-4">
                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
                    <li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
                    <li><a href="/" aria-label="Sign in" title="Sign in" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Sign in</a></li>
                    <li>
                      <a
                        href="/"
                        class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                        aria-label="Sign up"
                        title="Sign up"
                      >
                        Sign up
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            -->
        </div>
    </div>
</div>
