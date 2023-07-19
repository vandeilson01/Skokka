@php 
  use App\Models\City;
  use App\Models\State;
  use App\Models\Category;

  $states = State::all();
  $citys = City::all();
  $categorias = Category::all();
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
                        Editar Anúncio 
                      </h3>

                        <div class="pull-right">
                            <a class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ url('admin/meus-anuncios') }}"> Voltar</a>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                   
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="block w-full overflow-x-auto p-2">
                                     
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        
                            <form action="{{ url('admin/allanuncios/update',$anuncio->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                        
                                <div class="relative p-2 overflow-x-auto shadow-md sm:rounded-lg">

                                      <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acompanhante:</label>
                                                <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" disabled value="{{ $acompanhante->email ?? $acompanhante->name }}">
                                            </div>

                                            <div>
                                              <label for="cegoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria:</label>

                                              <select name="cegoria"  id="cegoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                                              <option value="{{$anuncio->categoria}}">{{ $categorias->where('id', $anuncio->categoria)->first()->name ?? '' }}</option>

                                                @foreach($categorias as $row)
                                                  <option value="{{$row->id}}">{{ $row->name }}</option>
                                                @endforeach
                                                  
                                              </select>
                                            </div>


                                            <div>
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="titulo_anuncio" value="{{ $anuncio->titulo_anuncio }}">
                                            </div>

                                            <div>
                                                <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto:</label>
                                                <textarea name="texto"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $anuncio->texto }}</textarea>
                                            </div>
 
                                            <div>
                                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereco:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="endereco" value="{{ $anuncio->endereco }}">
                                            </div>

                                            <div>
                                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distrito:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="endereco" value="{{ $anuncio->distrito }}">
                                            </div>


                                            <div>
                                              <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalhes(Estado):</label>

                                              <select name="state"  id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


                                              <option value="{{$anuncio->estado}}">{{ $citys->where('id', $anuncio->estado)->first()->name ?? '' }}</option>

                                                @foreach($states as $row)
                                                  <option value="{{$row->id}}">{{ $row->name }}</option>
                                                @endforeach
                                                  
                                              </select>
                                            </div>

                                            <div>
                                                <label for="details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detalhes(Cidade):</label>

                                                <select id="city" name="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                
                                                  <option class="text-blue" value="{{ $anuncio->cidade }}">{{ $citys->where('id', $anuncio->cidade)->first()->name ?? '' }}</option>

                                                  @foreach($citys as $row)
                                                    <option value="{{$row->id}}">{{ $row->name }}</option>
                                                  @endforeach
                                                    
                                                </select>
                                            </div>
 
                                            <div>
                                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idade:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="idade" value="{{ $anuncio->idade }}">
                                            </div>

                                            <div>
                                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CEP:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="postal" value="{{ $anuncio->postal }}">
                                            </div>

                                            <div>
                                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone:</label>
                                                <input  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="telefone" value="{{ $anuncio->telefone }}">
                                            </div>

                                            <div>
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagens Novas:</label>
                                                <input  type="file" name="imagens"  multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>

                                             
                                            <div>
                                              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Salvar</button>  
                                            </div>

                                            @foreach($anuncioimg as $r)
                                                <div>
                                                    <img class="h-auto max-w-lg rounded-lg" src="{{ url('anuncios/'.$acompanhante->id.'/'.$anuncio->id.'/'.$r->img)}}">
                                                </div>
                                            @endforeach

                                      </div>
  
 
                              </div>
                        
                            </form>



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
 