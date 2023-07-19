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
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
              >

              @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
             @endif
             

                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-blueGray-700">
                        Horários dos anúncios<br/>
                        (São aplicados em todos os anúncios)
                      </h3>

                    <a href="{{ url('admin/allanuncioshora/create')}}" class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Adicionar 
                    </a>
                    </div>
                  </div>
                </div>

                
                <div class="block w-full overflow-x-auto">
                   
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Inicio
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Fim
                                        </th>
                                         
                                        <th scope="col" class="px-6 py-3">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($anuncios as $anuncio)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ ++$i }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $anuncio->start }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $anuncio->end }}
                                        </td>
                                       
                                       
                                        <td class="px-6 py-4">
                                            <form action="{{ route('allanuncioshora.destroy',$anuncio->id) }}" method="POST">
                            
                                            <!-- <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('allanuncioshora.show',$anuncio->id) }}">Show</a> -->
                                
                                            <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('allanuncioshora.edit',$anuncio->id) }}">Edit</a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="delete font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    
                                        </tr>
                                @endforeach
                                    
                                </tbody>
                        
                        
                            </table>
                            {!! $anuncios->links() !!}

                        </div>

                </div>
              </div>
            </div>

            <!-- <div class="w-full mb-12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-pink-900 text-white"
              >
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-lg text-white">
                        Card Tables
                      </h3>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                 
    
                </div>
              </div>
            </div> -->

          </div>

          <x-footer-adm/>
          </div>
      </div>
    </div>
</x-admin>