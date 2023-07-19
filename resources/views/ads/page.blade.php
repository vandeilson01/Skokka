<x-app-layout>
@php
  $acompanhantes = App\Models\AcompanhantesModel::all();
   $anuncios = App\Models\AnunciosModel::all();
   $anunciosimg = App\Models\AnunciosImg::all();
   $states = App\Models\State::all();
   $citys = App\Models\City::all();
   $categorias = App\Models\Category::all();

   
@endphp

    @if(!empty($nameid))

        @php 
            $ver = $anuncios->where('id', $nameid)->first();
        @endphp


        @if($ver->status == 'success')
<!--          
            <div>{{$ver->id}}</div>
            <div>{{$acompanhantes->where('id', $ver->id_acompanhante)->first()->name}}</div>
            <div>{{$ver->idade}}</div>
            <div>{{$ver->edereco}}</div>
            <div>{{$ver->telefone}}</div>
            <div>{{$ver->tel_email}}</div>

           

            <div>{{$ver->suas_fotos ?? 'não é minhas fotos'}}</div>

            <div>{{$ver->distrito}}</div>
            <div>{{$ver->endereco}}</div>
            <div>{{$ver->postal}}</div>
            <div>{{$ver->cidade}}</div>


            <div>{{$ver->created_at ?? $ver->updated_at}}</div>
            <div>{{$anunciosimg->where('id_anuncio', $ver->id)}}</div> -->
    
        <section class="container">
            {{--<x-image-gallery/>--}}


            <div class="container mx-auto">
    <section class="p-10 flex flex-col items-center lg:items-start  space-y-2">
        <div class="flex  items-center space-x-5">
        <!-- <p class="italic text-base">20 de fevereiro</p> -->
        <p class="italic text-base">{{date('d/m', strtotime($ver->created_at)) ?? date('d/m', strtotime($ver->updated_at))}}</p>
        <div class="flex items-center w-15 h-6 bg-blue-800 text-blue-100  text-sm font-medium mr-2 px-2.5 py-0.5 rounded shadow-md dark:bg-blue-900 dark:text-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
              </svg>
              
            <p>Top</p>

        </div>
        </div>
        <div class="flex space-x-1">
            <p class="text-base">{{$ver->idade}} anos |</p>
            <p class="text-base">{{$categorias->where('id',$ver->categoria)->first()->name ?? ''}} | </p>
            <p class="text-base  flex space-x-1 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
              </svg>
              <div>{{$states->where('id', $ver->estado)->first()->name ?? ''}} </div>
              <div>{{$citys->where('id', $ver->cidade)->first()->name ?? ''}} |</div>
              </p> <p class="text-base"><div>{{$ver->distrito}}</div></p>

        </div>
    </section>
    <section class="p-10">
        <h1 class="text-4xl font-semibold mt-2 text-center lg:text-start text-black">{{$acompanhantes->where('id', $ver->id_acompanhante)->first()->name}} | {{$ver->titulo_anuncio}}</h1>
     
         <p class="text-justify lg:text-2xl p-10 text-gray-500">
            <div>{{$ver->texto}}</div>
         </p>
    </section>
    <div class="grid-cols-3 p-10 space-y-2 lg:space-y-0 lg:grid {{!empty($arr[3]) ? 'lg:gap-3 lg:grid-rows-3' : ''}} ">
 

        @foreach($anunciosimg->where('id_anuncio', $ver->id) as $r)

            @php $arr[] = $r->file; @endphp 

        @endforeach
       
        @if(!empty($arr[0]))
            <div class="w-full rounded">
                <img src="{{ url('anuncios/'.$ver->id_acompanhante.'/'.$ver->id.'/'.$arr[0]) }}"
                    alt="image">
            </div>

        @endif

        @if(!empty($arr[1]))
            <div class="w-full rounded">
                <img src="{{ url('anuncios/'.$ver->id_acompanhante.'/'.$ver->id.'/'.$arr[1]) }}"
                    alt="image">
            </div>

        @endif

        @if(!empty($arr[2]))
            <div class="w-full rounded">
                <img src="{{ url('anuncios/'.$ver->id_acompanhante.'/'.$ver->id.'/'.$arr[2]) }}"
                    alt="image">
            </div>

        @endif


        @if(!empty($arr[3]))
            <div class="w-full col-span-2 row-span-2 rounded">
                <img src="{{ url('anuncios/'.$ver->id_acompanhante.'/'.$ver->id.'/'.$arr[3]) }}"
                    alt="image">
            </div>

        @endif


        @if(!empty($arr[4]))
            <div class="w-full col-span-2 row-span-2 rounded">
                <img src="{{ url('anuncios/'.$ver->id_acompanhante.'/'.$ver->id.'/'.$arr[3]) }}"
                    alt="image">
            </div>

        @endif
        
   
    </div>
    <div class="flex justify-center items-center space-x-5 w-full p-10">
        <a href="tel:{{$ver->telefone}}" class="flex space-x-5 items-center text-white uppercase text-center border border-green-800 bg-shokka-pink hover:bg-pink-800 rounded py-3 px-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
              
               TELEFONE
        </a>

        <a href="https://wa.me/{{$ver->telefone}}" class="flex space-x-5 items-center text-white uppercase text-center border border-green-800 bg-green-400 hover:bg-green-600 rounded py-3 px-10">
            <svg
                class="w-6 h-6 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512">
                <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                ></path>
                </svg>
                whatsapp
            </a>
    </div>
</div>
        </section>


        <section class="p-10">
            
            <div class="justify-center  space-x-5 w-full p-10">
                <p class="text-center mb-4">Compartilhar</p>
            </div>
            <div class="flex py-3 justify-center">
           
            <div class="flex py-3 justify-center">
                <a class="p-3" href="#" >
                    <i class="gg-twitter"></i>
                </a>

                <a class="p-3" href="#" >
                    <svg
                        class="  w-6 h-6 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                        ></path>
                        </svg>
                </a>
            </div>
                 
            </div>
        </section>
    @endif

    <x-page-footer/>

    @endif
</x-app-layout>