<div>

    <h2 class="text-lg font-semibold text-gray-900">Upcoming meetings</h2>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
        <div class="mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">
            <div class="flex items-center text-gray-900">
                <button wire:click.prevent="previouseMonth" type="button"
                    class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Previous month</span>
                    <!-- Heroicon name: solid/chevron-left -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="flex-auto font-semibold">{{ $monthname }} {{$year}}</div>
                <button wire:click.prevent="nextMonth" type="button"
                    class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Next month</span>
                    <!-- Heroicon name: solid/chevron-right -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-7 mt-6 text-xs leading-6 text-gray-500">
                <div>M</div>
                <div>T</div>
                <div>W</div>
                <div>T</div>
                <div>F</div>
                <div>S</div>
                <div>S</div>
            </div>
            <div
                class="grid grid-cols-7 gap-px mt-2 text-sm bg-gray-200 rounded-lg shadow isolate ring-1 ring-gray-200">



                @foreach ($onemonth as $day)
                    @if (substr($day, 0, 3) == 'pre')
                        <button type="button"
                            class="rounded-tl-lg bg-gray-50 py-1.5 text-gray-400 hover:bg-gray-100 focus:z-10">
                            <!--
                            Always include: "mx-auto flex h-7 w-7 items-center justify-center rounded-full"
                            Is selected and is today, include: "bg-indigo-600"
                            Is selected and is not today, include: "bg-gray-900"
                            -->
                            <time datetime="{{ substr($day, 8, 11) }}"
                                class="flex items-center justify-center mx-auto rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                        </button>
                    @elseif(substr($day, 8, 10) == substr($today, 0, 10))
                        <button type="button" class="bg-white py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10">
                            <time datetime="{{ substr($day, 8, 11) }}"
                                class="flex items-center justify-center mx-auto font-semibold text-white bg-gray-900 rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                        </button>
                    @else
                        <button type="button" class="bg-white py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10">
                            <time datetime="{{ substr($day, 8, 11) }}"
                                class="flex items-center justify-center mx-auto rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                        </button>
                    @endif


                    @if (isset($nom))
                        <ol class="mt-2">
                            @foreach ($nom as $n)
                                @if (substr($day, 8, 10) == $n->event_start)
                                    <li>
                                        <a href="#" class="flex group">
                                            <p
                                                class="flex-auto font-medium text-gray-900 truncate group-hover:text-indigo-600">
                                                {{ $n->subject }}</p>

                                            <time datetime="{{ $n->event_start }}"
                                                class="flex-none hidden ml-3 text-gray-500 group-hover:text-indigo-600 xl:block">{{ $n->time_start }}</time>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ol>
                    @endif
                @endforeach

            </div>
            <button type="button"
                class="w-full px-4 py-2 mt-8 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow focus:outline-none hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add
                event</button>
        </div>
        <ol class="mt-4 text-sm leading-6 divide-y divide-gray-100 lg:col-span-7 xl:col-span-8">
            <li class="relative flex py-6 space-x-6 xl:static">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="flex-none rounded-full h-14 w-14">
              <div class="flex-auto">
                <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">Leslie Alexander</h3>
                <dl class="flex flex-col mt-2 text-gray-500 xl:flex-row">
                  <div class="flex items-start space-x-3">
                    <dt class="mt-0.5">
                      <span class="sr-only">Date</span>
                      <!-- Heroicon name: solid/calendar -->
                      <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                      </svg>
                    </dt>
                    <dd><time datetime="2022-01-10T17:00">January 10th, 2022 at 5:00 PM</time></dd>
                  </div>
                  <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                    <dt class="mt-0.5">
                      <span class="sr-only">Location</span>
                      <!-- Heroicon name: solid/location-marker -->
                      <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                      </svg>
                    </dt>
                    <dd>Starbucks</dd>
                  </div>
                </dl>
              </div>
              <div class="absolute right-0 top-6 xl:relative xl:top-auto xl:right-auto xl:self-center">
                <div>
                  <button type="button" class="flex items-center p-2 -m-2 text-gray-500 rounded-full hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open options</span>
                    <!-- Heroicon name: solid/dots-horizontal -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                    </svg>
                  </button>
                </div>

                <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white rounded-md shadow-lg focus:outline-none w-36 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0">Edit</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-1">Cancel</a>
                  </div>
                </div>
              </div>
            </li>

            <!-- More meetings... -->
          </ol>
    </div>
</div>

{{-- <!-- This example requires Tailwind CSS v2.0+ -->
<div>

    <h2 class="text-lg font-semibold text-gray-900">Upcoming meetings</h2>
    <div class="lg:grid lg:grid-cols-12 lg:gap-x-16">
      <div class="mt-10 text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 lg:mt-9 xl:col-start-9">
        <div class="flex items-center text-gray-900">
          <button  wire:click.prevent="previouseMonth" type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Previous month</span>
            <!-- Heroicon name: solid/chevron-left -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
          <div class="flex-auto font-semibold">{{$monthname}}</div>
          <button wire:click.prevent="nextMonth" type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5 text-gray-400 hover:text-gray-500">
            <span class="sr-only">Next month</span>
            <!-- Heroicon name: solid/chevron-right -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div class="grid grid-cols-7 mt-6 text-xs leading-6 text-gray-500">
          <div>M</div>
          <div>T</div>
          <div>W</div>
          <div>T</div>
          <div>F</div>
          <div>S</div>
          <div>S</div>
        </div>


        <div class="grid grid-cols-7 gap-px mt-2 text-sm bg-gray-200 rounded-lg shadow isolate ring-1 ring-gray-200">



        @foreach ($onemonth as $day)
            @if (substr($day, 0, 3) == 'pre')
                    <button type="button" class="rounded-tl-lg bg-gray-50 py-1.5 text-gray-400 hover:bg-gray-100 focus:z-10">
                        <!--
                        Always include: "mx-auto flex h-7 w-7 items-center justify-center rounded-full"
                        Is selected and is today, include: "bg-indigo-600"
                        Is selected and is not today, include: "bg-gray-900"
                        -->
                        <time datetime="{{ substr($day, 8, 11) }}" class="flex items-center justify-center mx-auto rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                        </button>
                @elseif(substr($day, 8, 10) == substr($today, 0, 10))
                <button type="button" class="bg-white py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10">
                    <time datetime="{{ substr($day, 8, 11) }}" class="flex items-center justify-center mx-auto font-semibold text-white bg-gray-900 rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                  </button>
                    @else
                    <button type="button" class="bg-white py-1.5 text-gray-900 hover:bg-gray-100 focus:z-10">
                        <time datetime="{{ substr($day, 8, 11) }}" class="flex items-center justify-center mx-auto rounded-full h-7 w-7">{{ substr($day, 16, 2) }}</time>
                      </button>
            @endif


             {{-- @if (isset($nom))
                <ol class="mt-2">
                    @foreach ($nom as $n)
                        @if (substr($day, 8, 10) == $n->event_start)
                            <li>
                                <a href="#" class="flex group">
                                    <p
                                        class="flex-auto font-medium text-gray-900 truncate group-hover:text-indigo-600">
                                        {{ $n->subject }}</p>

                                    <time datetime="{{ $n->event_start }}"
                                        class="flex-none hidden ml-3 text-gray-500 group-hover:text-indigo-600 xl:block">{{ $n->time_start }}</time>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            @endif --}}
{{-- @endforeach

</div> --}}
<!--
            Always include: "py-1.5 hover:bg-gray-100 focus:z-10"
            Is current month, include: "bg-white"
            Is not current month, include: "bg-gray-50"
            Is selected or is today, include: "font-semibold"
            Is selected, include: "text-white"
            Is not selected, is not today, and is current month, include: "text-gray-900"
            Is not selected, is not today, and is not current month, include: "text-gray-400"
            Is today and is not selected, include: "text-indigo-600"

            Top left day, include: "rounded-tl-lg"
            Top right day, include: "rounded-tr-lg"
            Bottom left day, include: "rounded-bl-lg"
            Bottom right day, include: "rounded-br-lg"
          -->
<!--
              Always include: "mx-auto flex h-7 w-7 items-center justify-center rounded-full"
              Is selected and is today, include: "bg-indigo-600"
              Is selected and is not today, include: "bg-gray-900"
            -->
{{-- <button type="button" class="w-full px-4 py-2 mt-8 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow focus:outline-none hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add event</button>
      </div>
      <ol class="mt-4 text-sm leading-6 divide-y divide-gray-100 lg:col-span-7 xl:col-span-8">
        <li class="relative flex py-6 space-x-6 xl:static">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="flex-none rounded-full h-14 w-14">
          <div class="flex-auto">
            <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">Leslie Alexander</h3>
            <dl class="flex flex-col mt-2 text-gray-500 xl:flex-row">
              <div class="flex items-start space-x-3">
                <dt class="mt-0.5">
                  <span class="sr-only">Date</span>
                  <!-- Heroicon name: solid/calendar -->
                  <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                  </svg>
                </dt>
                <dd><time datetime="2022-01-10T17:00">January 10th, 2022 at 5:00 PM</time></dd>
              </div>
              <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">
                <dt class="mt-0.5">
                  <span class="sr-only">Location</span>
                  <!-- Heroicon name: solid/location-marker -->
                  <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                  </svg>
                </dt>
                <dd>Starbucks</dd>
              </div>
            </dl>
          </div>
          <div class="absolute right-0 top-6 xl:relative xl:top-auto xl:right-auto xl:self-center">
            <div>
              <button type="button" class="flex items-center p-2 -m-2 text-gray-500 rounded-full hover:text-gray-600" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open options</span>
                <!-- Heroicon name: solid/dots-horizontal -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
              </button>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white rounded-md shadow-lg focus:outline-none w-36 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0">Edit</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-1">Cancel</a>
              </div>
            </div>
          </div>
        </li>

        <!-- More meetings... -->
      </ol>
    </div>
  </div> --}}
