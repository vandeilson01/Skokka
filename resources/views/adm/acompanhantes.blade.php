<x-admin>

    <div id="root">
        
        <x-menu-left-adm />

        
        <div class="relative md:ml-64 bg-blueGray-50">
        <x-menu-top-adm/>
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div>
              <!-- Card stats -->
              <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                  >
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div
                          class="relative w-full pr-4 max-w-full flex-grow flex-1"
                        >
                          <h5
                            class="text-blueGray-400 uppercase font-bold text-xs"
                          >
                            Acompanhante
                          </h5>
                         
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                          >
                          
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                      <span class="font-semibold text-xl text-blueGray-700">
                            {{ $acompanhantes->count() }}
                          </span>
                      </p>
                    </div>
                  </div>
                </div>
                
              </div>
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
                        Todos os acompanhantes
                      </h3>

                    <a href="{{ url('admin/acompanhantes/create') }}" class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
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
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Último Acesso
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3">
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ($acompanhantes as $acompanhante)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ ++$i }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $acompanhante->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ date('d/m/Y H:i', strtotime($acompanhante->updated_at)) ?? date('d/m/Y H:i', strtotime($acompanhante->created_at))  }}
                                        </td>
                                        
                                        <td class="px-6 py-4">
                                            <form action="{{ route('acompanhantes.destroy',$acompanhante->id) }}" method="POST">
                            
                                                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('acompanhantes.show',$acompanhante->id) }}">Show</a>
                                
                                                <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{ route('acompanhantes.edit',$acompanhante->id) }}">Edit</a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="delete font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>

                                            </form>
                                        </td>
                                    
                                        </tr>
                                @endforeach
                                    
                                </tbody>
                        
                        
                            </table>
                            {!! $acompanhantes->links() !!}

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