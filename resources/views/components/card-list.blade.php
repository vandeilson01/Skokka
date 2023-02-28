{{-- @props(['ads_type'])
@php
    switch($ads_type)
    {
        case 'FREE' :
        $ads = 'border '
    }
@endphp --}}
    <a href="#" class="relative flex flex-col min-w-full items-center bg-white border border-blue-400 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
        <div class="flex items-center w-15 h-6 bg-blue-800 text-blue-100  text-sm font-medium mr-2 px-2.5 py-0.5 rounded shadow-md dark:bg-blue-900 dark:text-blue-300 absolute -right-4 -top-3 lg:bottom-36">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
              </svg>
              
            <p>Top</p>
        </div>
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ asset('categories/womenseekmen_repr.jpg') }}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        </div>
    </a>
