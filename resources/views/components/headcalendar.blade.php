@extends('layout.layout')

@section('head')
<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="lg:flex lg:h-full lg:flex-col">
      <header class="relative z-20 flex items-center justify-between px-6 py-4 border-b border-gray-200 lg:flex-none">
        <h1 class="text-lg font-semibold text-gray-900">
          <time datetime="2022-01"> {{$monthname}} 2022</time>
        </h1>
        <div class="flex items-center">
          <div class="flex items-center rounded-md shadow-sm md:items-stretch">
            <button type="button" class="flex items-center justify-center py-2 pl-3 pr-4 text-gray-400 bg-white border border-r-0 border-gray-300 rounded-l-md hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
              <span class="sr-only">Previous month</span>
              <!-- Heroicon name: solid/chevron-left -->
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </button>
            <button type="button" class="hidden border-t border-b border-gray-300 bg-white px-3.5 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:relative md:block">Today</button>
            <span class="relative w-px h-5 -mx-px bg-gray-300 md:hidden"></span>
            <button type="button" class="flex items-center justify-center py-2 pl-4 pr-3 text-gray-400 bg-white border border-l-0 border-gray-300 rounded-r-md hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
              <span class="sr-only">Next month</span>
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
          <div class="hidden md:ml-4 md:flex md:items-center">
            <div class="relative">
              <button type="button" class="flex items-center py-2 pl-3 pr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50" id="menu-button" aria-expanded="false" aria-haspopup="true">
                Month view
                <!-- Heroicon name: solid/chevron-down -->
                <svg class="w-5 h-5 ml-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>

              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div class="absolute right-0 mt-3 overflow-hidden origin-top-right bg-white rounded-md shadow-lg focus:outline-none w-36 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                {{-- <div class="hidden py-1" role="none">
                  <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Day view</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Week view</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">Month view</a>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-3">Year view</a>
                </div> --}}
              </div>
            </div>
            <div class="w-px h-6 ml-6 bg-gray-300"></div>
            <button type="button" class="px-4 py-2 ml-6 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm focus:outline-none hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add event</button>
          </div>
          <div class="relative ml-6 md:hidden">
            <button type="button" class="flex items-center p-2 -mx-2 text-gray-400 border border-transparent rounded-full hover:text-gray-500" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open menu</span>
              <!-- Heroicon name: solid/dots-horizontal -->
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
              </svg>
            </button>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="absolute right-0 mt-3 overflow-hidden origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg focus:outline-none w-36 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0">Create event</a>
              </div>
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-1">Go to today</a>
              </div>
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-2">Day view</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-3">Week view</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-4">Month view</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-5">Year view</a>
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
        <div class="grid grid-cols-7 gap-px text-xs font-semibold leading-6 text-center text-gray-700 bg-gray-200 border-b border-gray-300 lg:flex-none">
          <div class="py-2 bg-white">M<span class="sr-only sm:not-sr-only">on</span></div>
          <div class="py-2 bg-white">T<span class="sr-only sm:not-sr-only">ue</span></div>
          <div class="py-2 bg-white">W<span class="sr-only sm:not-sr-only">ed</span></div>
          <div class="py-2 bg-white">T<span class="sr-only sm:not-sr-only">hu</span></div>
          <div class="py-2 bg-white">F<span class="sr-only sm:not-sr-only">ri</span></div>
          <div class="py-2 bg-white">S<span class="sr-only sm:not-sr-only">at</span></div>
          <div class="py-2 bg-white">S<span class="sr-only sm:not-sr-only">un</span></div>
        </div>
        <div class="flex text-xs leading-6 text-gray-700 bg-gray-200 lg:flex-auto">
            <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
              <!--
                Always include: "relative py-2 px-3"
                Is current month, include: "bg-white"
                Is not current month, include: "bg-gray-50 text-gray-500"
              -->


              @foreach ($predays as $preday)

              <div class="relative px-3 py-2 text-gray-500 bg-gray-50">
                <time datetime="2021-12-28">{{substr($preday, -11,-9)}}</time>
              </div>

              @endforeach
              @foreach ($days as $day)

              <div class="relative px-3 py-2 bg-white">
                <time datetime="2022-01-01">{{substr($day, -11,-9)}}</time>
              </div>

              @endforeach



            </div>
        </div>
    </div>

  </div>
@endsection
