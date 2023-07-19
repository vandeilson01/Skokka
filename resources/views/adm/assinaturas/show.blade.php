@php 
 use App\Models\CategoryPlus;
 use App\Models\Category;
 use App\Models\AnunciosModel;
 use App\Models\AssinaturasModel;
 use App\Models\PlansModel;
 use App\Models\PaymentModel;
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
              <!-- Card stats -->
               
              
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
                        Ver Assinatura
                      </h3>

                        <div class="pull-right">
                            <a class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ url('admin/assinaturas') }}"> Voltar</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                   
                <div class="block w-full overflow-x-auto">
                   
                   <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">
                         <div class="grid gap-6 mb-6 md:grid-cols-2">
                             <div>
                                 <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acompanhante:</label>
                                 <p  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $assinaturas->id_acompanhante }}</p>
                             </div>

                             <div>
                                 <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anúncio:</label>
                                 <p  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ AnunciosModel::where('id',$assinaturas->id_anuncio)->first()->titulo_anuncio ?? '' }}</p>
                             </div>

                             <div>
                                 <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plano:</label>
                                 <p  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{  PlansModel::where('id',$assinaturas->id_plan)->first()->name ?? '' }}</p>
                             </div>

                             <div>
                                 <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dias:</label>
                                 <p  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $assinaturas->days }}</p>
                             </div>

                             <div>
                                 <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expira em:</label>
                                 <p  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ date('d/m/Y', strtotime($assinaturas->expired)) }}</p>
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
      </div>
    </div>
</x-admin>
 
 