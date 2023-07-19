@php 

  use App\Models\AnunciosModel;
  use App\Models\AcompanhantesModel;
  use App\Models\Assinatuaras;
  use App\Models\PlansModel;
  use App\Models\PaymentModel;

@endphp
<x-admin>
 

      <div id="root">

      <x-menu-left-adm />
        
      <div class="relative md:ml-64 bg-blueGray-50">
        
        <x-menu-top-adm />
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
                            Anúncios
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                            {{  AnunciosModel::count() }}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                          >
                            <i class="far fa-chart-bar"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <!-- <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 3.48%
                        </span> -->
                        <!-- <span class="whitespace-nowrap">
                          Since last month
                        </span> -->
                      </p>
                    </div>
                  </div>
                </div>
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
                            Acompanhantes
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                          {{  AcompanhantesModel::count() }}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                          >
                            <i class="fas fa-chart-pie"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <!-- <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span> -->
                        <!-- <span class="whitespace-nowrap"> Since last week </span> -->
                      </p>
                    </div>
                  </div>
                </div>
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
                          Pagamentos
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                          {{  PaymentModel::count() }}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500"
                          >
                            <i class="fas fa-users"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <!-- <span class="text-orange-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 1.10%
                        </span> -->
                        <!-- <span class="whitespace-nowrap"> Since yesterday </span> -->
                      </p>
                    </div>
                  </div>
                </div>
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
                            Planos
                          </h5>
                          <span class="font-semibold text-xl text-blueGray-700">
                          {{  PlansModel::count() }}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500"
                          >
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                      </div>
                      <p class="text-sm text-blueGray-400 mt-4">
                        <!-- <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 12%
                        </span> -->
                        <!-- <span class="whitespace-nowrap">
                          Since last month
                        </span> -->
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap">
            <!-- <div class="w-full mb-12 xl:mb-0 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700"
              >
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                      <h6
                        class="uppercase text-blueGray-100 mb-1 text-xs font-semibold"
                      >
                        
                      </h6>
                      <h2 class="text-white text-xl font-semibold">
                        Assinaturas
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="p-4 flex-auto">
                  <div class="relative h-350-px">
                    <canvas id="line-charts"></canvas>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="w-full px-4">
              <!-- <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
              >
                <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                      <h6
                        class="uppercase text-blueGray-400 mb-1 text-xs font-semibold"
                      >
                        
                      </h6>
                      <h2 class="text-blueGray-700 text-xl font-semibold">
                        Cadastros
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="p-4 flex-auto">
                  <div class="relative h-350-px">
                    <canvas id="bar-charts"></canvas>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="flex flex-wrap mt-4">
          
            <div class="w-full  px-4">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
              >
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1"
                    >
                      <h3 class="font-semibold text-base text-blueGray-700">
                        Acessar
                      </h3>
                    </div>
                    <div
                      class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
                    >
                      <a
                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        href="{{ url('admin/mercadopago')}}"
                      >
                        Mercado Pago
                      </a>
                    </div>
                  </div>
                </div>
                
                
              </div>
            </div>
          </div>

        
        </div>
      </div>
    </div>
  <x-footer-adm/>
</x-admin>
