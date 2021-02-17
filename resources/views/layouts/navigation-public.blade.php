<nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-black">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="#pablo">
                Blog
            </a>
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="#pablo">
                Portfolio
            </a>
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="#pablo">
                CV
            </a>
            <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
               href="#pablo">
                Contact
            </a>

            {{--   <div x-show="dropdownOpen" @click="dropdownOpen = false"
                    class="fixed inset-0 h-full w-full z-10"></div>

               <div x-show="dropdownOpen"
                    class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                   @foreach($categories as $category)
                       <a class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white"
                          href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
                   @endforeach
               </div>--}}
        </div>


        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center lg:mx-auto">

            <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Matt-Lab</span>
        </a>

        <div class="relative flex w-full sm:w-7/12 md:w-5/12 px-4 flex-wrap items-stretch lg:ml-auto">
            <div class="flex">
          <span
              class="font-normal leading-snug flex text-center white-space-no-wrap border border-solid border-indigo-600 rounded-full text-sm bg-indigo-100 items-center rounded-r-none pl-2 py-1 text-indigo-800 border-r-0 placeholder-indigo-300">
            <i class="fas fa-search"></i>
          </span>
            </div>

            <input type="text"
                   class="px-2 py-1 h-8 border border-solid  border-indigo-600 rounded-full text-sm leading-snug text-indigo-700 bg-indigo-100 shadow-none outline-none focus:outline-none w-full font-normal rounded-l-none flex-1 border-l-0 placeholder-indigo-300"
                   placeholder="Search indigo"/>
        </div>

        {{-- <form role="search" method="get" class="s-header__search-form" action="{{ Route('posts.search') }}">
             <label>
                 <input id="search" type="search" name="search" class="s-header__search-field"
                        placeholder="@lang('Recherche...')" title="@lang('Search for:')" autocomplete="off">
             </label>
             --}}{{--                <input type="submit" class="s-header__search-submit" value="Search">--}}{{--
         </form>--}}
            <button
                class="text-white font-bold uppercase text-sm px-6 py-3 outline-none focus:outline-none mr-1 mb-1"
                style="transition:all .15s ease" type="button" onclick="openDropdown(event,'dropdown-id')">
                <i class="fas fa-user text-lg leading-lg text-white opacity-75"></i>
            </button>
            <div class="hidden bg-white  text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                 style="min-width:12rem" id="dropdown-id">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route ('login') }}"
                           class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800">
                            Se connecter
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="text-sm py-2 px-4 font-normal block w-full whitespace-no-wrap bg-transparent text-gray-800">
                                Créer
                                un compte
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
    <script>
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            var popper = new Popper(element, document.getElementById(dropdownID), {
                placement: 'bottom-start'
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>


</nav>


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
