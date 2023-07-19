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
                        Adicionar plano
                      </h3>

                        <div class="pull-right">
                            <a class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ url('admin/clientes') }}"> Voltar</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                   
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="block w-full overflow-x-auto p-2">
                                                                
                                    <div class="row">
                                            <div class="col-lg-12 margin-tb">
                                                <div class="pull-left">
                                                    <h2> Show plano</h2>
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-primary" href="{{ route('planos.index') }}"> Back</a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Name:</strong>
                                                    {{ $plano->name }}
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
 
 