    
@php
   $acompanhantes = App\Models\AcompanhantesModel::all();
   $anuncios = App\Models\AnunciosModel::all();
   $anunciosimg = App\Models\AnunciosImg::all();
   $states = App\Models\State::all();
   $citys = App\Models\City::all();
@endphp

<x-app-layout>
 
<x-modal-permission />
<section class="text-center mb-5">
      <ul class="flex flex-wrap  mb-5 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
               <a href="#" class="mr-4 hover:underline">
                  <button class="bg-transparent hover:bg-pink-500 text-pink-700 font-semibold hover:text-white py-2 px-4 border border-pink-500 hover:border-transparent rounded">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                     </svg>

                  </button>
               </a>
            </li>
 
           
            @if(!empty($categories))

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <!-- > -->
               </a>
            </li>

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <button class="bg-transparent hover:bg-pink-500 text-pink-700 font-semibold hover:text-white py-2 px-4 border border-pink-500 hover:border-transparent rounded">
                     {{$all['categories'] ?? $categories}}
                  </button>
               </a>
            </li>
 
            @endif

            
            @if(!empty($state))

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <!-- > -->
               </a>
            </li>
            

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <button class="bg-transparent hover:bg-pink-500 text-pink-700 font-semibold hover:text-white py-2 px-4 border border-pink-500 hover:border-transparent rounded">
                     {{ $citys->where('id', $state)->first()->name ?? '' }}
                  </button>
               </a>
            </li>

            
            @endif

            

            @if(!empty($city))

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <!-- > -->
               </a>
            </li>

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <button class="bg-transparent hover:bg-pink-500 text-pink-700 font-semibold hover:text-white py-2 px-4 border border-pink-500 hover:border-transparent rounded">
                     {{ $citys->where('id', $city)->first()->name ?? '' }}
                  </button>
               </a>
            </li>
 
            @endif

            @if(!empty($terms))

            <li>
               <a href="#" class="mr-4 hover:underline">
                  <!-- > -->
               </a>
            </li>
             
            <li>
               <a href="#" class="mr-4 hover:underline">
                  <button class="bg-transparent hover:bg-pink-500 text-pink-700 font-semibold hover:text-white py-2 px-4 border border-pink-500 hover:border-transparent rounded">
                     {{$terms}}
                  </button>
               </a>
            </li> 
            
            @endif
 
      </ul>
     
</section>
@php 
   $nova = !empty($city) ? $city : $state;
@endphp

@if(!empty($nova))
<section class="mt-5 mb-5">
   <div>{{ucfirst($all['categories'] ?? $categories)}} em {{ $citys->where('id', $nova)->first()->name ?? '' }}</div>
   <div>{{date('d/m')}}</div>
</section>
<section class="mb-5 mt-5">
 
   @foreach(App\Models\AnunciosModel::where('cidade', $nova)->get() as $row)

   
         @php 
 
            $a = $anunciosimg->where('id_anuncio', $row->id)->first();

         @endphp


         @if(!empty($a) && $row->status == 'success')

         @php 

            $imagem = $anunciosimg->where('id_anuncio', $row->id)->first()->img;

         @endphp
          
         <a href="{{ url('/ver/'.$row->id)}}">
        <div class="max-w-sm w-full lg:max-w-full lg:flex mb-5 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r">
      
            <div class="h-48 lg:h-auto lg:w-60 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="border: 1px solid red;background-image: url('{{ url('anuncios/'.$row->id_acompanhante.'/'.$row->id.'/'.$imagem ?? '') }}')" title="Woman holding a mug">           
            </div>
 
            <div c class="sm:w-1/1  p-4 flex flex-col justify-between leading-normal">
            <div class="flex w-10 h-6 bg-blue-800 text-blue-100 text-sm font-medium mr-2 px-2.5 py-0.5 rounded shadow-md dark:bg-blue-900 dark:text-blue-300">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75"></path>
               </svg>
               <p>Top</p>
            </div>
               <div class="mb-8">
                  <p class="text-sm text-gray-600 flex ">
                   
                  {{-- $row->id_acompanhante --}}
                  </p>
                  <div class="text-pink-900 font-bold text-xl mb-2">{{ $row->titulo_anuncio }}</div>
                  <p class="text-gray-700 text-base">{{ $row->texto }}</p>
               </div>

               <div class="mb-8">
                  <p class="text-sm text-gray-600 flex ">
                 
                  <strong>{{$row->idade}} anos </strong> | <strong> {{ucfirst($all['categories'] ?? $categories)}} </strong> | {{$citys->where('id', $row->cidade)->first()->name ?? ''}}</p>
                  </p>
               </div>
 
            </div>
         </div>

         </a>
 
         @endif
       

      @endforeach


      @else
      <div class="max-w-sm w-full lg:max-w-full lg:flex mb-5 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r">
      
         <div class="h-48 lg:h-auto lg:w-60 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="border: 1px solid red;background-image: url('{{ url('anuncios/'.$row->id_acompanhante.'/'.$row->id.'/'.$imagem ?? '') }}')" title="Woman holding a mug">           
         Não existe anúncios ainda.
         </div>
      </div>

      @endif
  
      <!--  -->
  
 
     </section>

     <x-page-footer/>
     
</x-app-layout>
