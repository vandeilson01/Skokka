@php 
  use App\Models\City;
  use App\Models\State;

  $states = State::all();
  $citys = City::all();
@endphp 
<x-admin>

    <div id="root">
        
        <x-menu-left-adm />

        
        <div class="relative md:ml-64 bg-blueGray-50">
        <x-menu-top-adm/>
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
             
              
            </div>
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">

                @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                @endif

                <div class="rounded-t mb-0 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-2 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-blueGray-700">
                        Ver Anúncio
                      </h3>

                        <div class="pull-right">
                            <a class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ url('admin/allanuncios') }}"> Voltar</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                   
  
               
                <div class="block w-full overflow-x-auto">
                   
                        <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

                              <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acompanhante:</label>
                                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" value="{{ $acompanhante->email ??  ''}}">
                                    </div>

                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                                          @php
                                              if($anuncio->status == 'success'){
                                                echo '
                                                  <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" >
                                                    <a href="#">Já Paga</a>
                                                  </p>
                                                 ';
                                              }else if($anuncio->status == 'pending'){
                                                echo '
                                                  <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" >
                                                    <a href="'.url('mercadopago/pagamento/'.$anuncio->collection_id).'">Pedente</a>
                                                  </p>
                                                 ';
                                              }else if($anuncio->status == 'failure'){
                                                echo '
                                                  <p class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" >
                                                    <a href="'.url('mercadopago/pagamento/'.$anuncio->collection_id).'">Falha</a>
                                                  </p>
                                                 ';
                                              }
                                              
                                          @endphp
                                        
                                    </div>
 
                                    <div>
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="name" value="{{ $anuncio->titulo_anuncio }}">
                                    </div>

                                    <div>
                                        <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto:</label>
                                        <textarea  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $anuncio->texto }}</textarea>
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ $anuncio->endereco }}">
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cidade:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ City::where('id', $anuncio->cidade)->first()->name ?? ''}}">
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ State::where('id', $anuncio->estado)->first()->name ?? ''}}">
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idade:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ $anuncio->idade }}">
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ $anuncio->postal }}">
                                    </div>

                                    <div>
                                        <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone:</label>
                                        <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="link" value="{{ $anuncio->telefone }}">
                                    </div>
  
                              </div>

                              <div class="grid gap-6 mb-6 md:grid-cols-2">

                                @foreach($anuncioimg as $r)
                                    <div>
                                        <img class="h-auto max-w-lg rounded-lg" src="{{ url('anuncios/'.$acompanhante->id.'/'.$anuncio->id.'/'.$r->img)}}">
                                    </div>
                                @endforeach

                              </div>


                              <div>
                                
                              </div>

 
                          </div>

                </div>

                </div>
              </div>
            </div>


          </div>

          </div>
      </div>
    </div>
</x-admin>
 
 