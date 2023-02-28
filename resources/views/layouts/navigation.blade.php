@php
$categories = App\Models\Category::all();
$states = App\Models\State::all();
@endphp
<nav x-data="{ open: false, search:false }" class="bg-zinc-100 border-b border-gray-100 p-10 flex flex-col justify-between items-center space-y-10">
    <div class="container flex md:flex-col lg:flex-row justify-between items-center w-full mx-auto">
            <a href="/" class="w-64">
                <div class="bg-logo w-64 h-14 bg-no-repeat bg-inherit"></div>
            </a>
            <button class="lg:hidden text-shokka-pink transition ease-in hover:text-shokka-blue-hover"  x-on:click="open=!open">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>              
            </button>
        <ul class="hidden lg:flex flex-row gap-2">
            <li>
              <a href="{{ route('login') }}" class="font-bold text-shokka-pink hover:text-shokka-blue-hover transition ease-in inline-flex py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                  </svg>
                Fazer Login</a>
            </li>
            <li>
              <a href="{{ route('register') }}" class="font-bold text-shokka-pink hover:text-shokka-blue-hover transition ease-in  inline-flex py-2 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                  
                Cadastrar-se</a>
            </li>
            <li>
              <a href="#" class="inline-flex py-2 px-5 text-white bg-shokka-blue transition ease-in hover:bg-shokka-blue-hover rounded"><span class="font-bold mr-1">+</span>PUBLICAR ANUNCIO</a>
            </li>
          </ul>
    </div>
    <ul class="flex flex-col gap-2 w-full" :class="open? 'transition ease-linear block' : 'hidden'">
      <li>
        <a href="#" class="font-bold text-shokka-pink hover:text-shokka-blue-hover transition ease-in inline-flex py-2 px-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
          Fazer Login</a>
      </li>
      <li>
        <a href="#" class="font-bold text-shokka-pink hover:text-shokka-blue-hover transition ease-in  inline-flex py-2 px-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            
          Cadastrar-se</a>
      </li>
      <li>
        <a href="#" class="block text-center py-2 px-5 text-white bg-shokka-blue transition ease-in hover:bg-shokka-blue-hover rounded"><span class="font-bold mr-1">+</span>PUBLICAR ANUNCIO</a>
      </li>
    </ul>
    <form action="{{ route('list.home.search.redirect') }}" method="post" class="hidden lg:block container w-full">
      @csrf
        <div class="container md:flex flex-col space-y-9 items-center justify-between w-full">
        <div class="flex items-center justify-between space-x-5 w-full">
           <select name="categories" class="block border-zinc-200  font-medium text-gray-400 rounded w-1/2">

            @foreach ($categories as $categorie)
            <option class="{{ $categorie->id }}">{{ $categorie->name }}</option>
            @endforeach
              
           </select>
           <input type="text" class="block border-zinc-200 font-medium rounded w-1/2" placeholder="pesquise aqui..." name="terms">
        </div>
         
        
        <div class="flex items-center justify-center space-x-5 w-full">
           <select name="state" class="block border-zinc-200  font-medium text-gray-400 rounded w-1/2">
            @foreach ($states as $state)
            <option class="{{ $state->id }}">{{ $state->name }}</option>
           @endforeach
           </select>
           <button type="submit" class="flex items-center px-10  bg-shokka-pink text-white font-normal  rounded border-none transition ease-in hover:bg-shokka-blue-hover">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
             <span class="py-3">
                PESQUISAR
             </span>
           </button>
        </div>
        </div>
    </form>  
    <!-- Form search mobile -->  
    <form action="{{ route('list.home.search.redirect') }}" method="post" class="lg:hidden container w-full" :class="open? 'transition ease-linear block' : 'hidden'">
      @csrf
      <div class="container md:flex flex-row space-y-9 items-center justify-between w-full">
      <div class="flex flex-col items-center justify-between space-y-5 w-full">
         <select name="categories" class="border-zinc-200  font-medium text-gray-400 rounded w-full">
          @foreach ($categories as $categorie)
          <option class="{{ $categorie->id }}">{{ $categorie->name }}</option>
          @endforeach
         </select>
         <input type="text" class="border-zinc-200 font-medium rounded w-full" placeholder="pesquise aqui..." name="terms">
      </div>
       
      
      <div class="flex flex-col items-center justify-between space-y-5 w-full">
         <select name="state" class=" border-zinc-200  font-medium text-gray-400 rounded w-full">
          @foreach ($states as $state)
           <option class="{{ $state->id }}">{{ $state->name }}</option>
          @endforeach
         </select>
         <button type="submit" class="flex items-center justify-center px-10 bg-shokka-pink text-white font-normal w-full  rounded border-none transition ease-in hover:bg-shokka-blue-hover">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
           <span class="py-3">
              PESQUISAR
           </span>
         </button>
      </div>
      </div>
  </form>  

</nav>
