
@php 
 use App\Models\CategoryPlus;
 use App\Models\Category;
@endphp

<x-app-layout>
     <section class="space-y-2">
        <h1 class="font-extrabold text-transparent  text-center text-4xl lg:text-6xl bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Encontros quentes na sua cidade</h1>
        <h5 class="text-center text-base font-medium">Tenha um encontro hoje em sua cidade, escolha sua categoria</h5>
     </section>
     <section>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
          @foreach($categories as $categorie)
          <div class="rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{ asset($categorie->image_url_dir) }}" alt="Acompanhantes">
            <div class="px-0 py-0">
              <div class="text-2xl mb-2 bg-shokka-pink text-white font-semibold pt-2 flex  items-center px-3 py-2">{{ $categorie->name }}</div>
              
              <p class="text-gray-700 text-base mb-4 px-3">
                {{ $categorie->description }}
              </p>

              @foreach(Category::find($categorie->id)->plus as $r)
                <p class="text-shokka-pink p-1"><a href="{{ url('procurar/'.strtolower($categorie->name).'/'.$r->details) }}">{{ $categorie->name }} {{ $citys->where('id', $r->details)->first()->name ?? '' }}</a></p>
                <hr/>
              @endforeach 
  

              <br/>
              <br/>

            </div>
          </div>
          @endforeach

        </div>
 

     </section>

     <section class="space-y-2 mb-3">
        <h5 class="text-center text-base font-medium">Seja bem-vindo ao portal de classificados eróticos Skokka. Entre os anúncios que pode ver na web, com certeza encontrará a pessoa ideal. Quer esteja à procura de acompanhantes ou de sexo virtual no Brasil. Navegue entre todas as categorias, mulheres e homens, acompanhantes, travestis, gay, casal, troca de casais, mulher procura mulher, lésbicas e pessoas que buscam amor. Poderá conhecer pessoas parecidas com você, que procuram o mesmo e contatá-las. Em Skokka pode criar seu própio anúncio grátis. Não espere mais, verá que tudo fica mais fácil depois que iniciar, dê o primeiro passo.</h5>
        <h5 class="text-center mb-2 text-base font-medium">Buscas frequentes: Acompanhantes Rio de Janeiro | Acompanhantes São Paulo | Acompanhantes Curitiba | Acompanhantes Brasilia | Acompanhantes Salvador | Acompanhantes Belo Horizonte</h5>
     </section>
     <br/>
     <br/>
     <hr/>
     <br/>
     <br/>

  

     <section class="space-y-2 text-center flex justify-center mb-5">
        <div class="w-full sm:w-10/12 md:w-1/1 my-1">
          <h2 class="text-xl font-semibold text-vnet-blue mb-5">Encontre anúncios neste local: Brasil.</h2>
          <ul class="flex flex-col text-shokka-pink">


          @foreach($categories as $categorie)

          <li class="bg-white my-2 shadow-lg" x-data="accordion({{ $categorie->id}})">
              <h2
                @click="handleClick()"
                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
              >
                <span>{{ $categorie->name }}</span>
                <svg
                  :class="handleRotate()"
                  class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                  viewBox="0 0 20 20"
                >
                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                </svg>
              </h2>
              <div
                x-ref="tab"
                :style="handleToggle()"
                class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
              >

              <ul class="md:w-1/1">
               
              @foreach(Category::find($categorie->id)->plus as $r)
                <li class=" ">
                  <p class="text-shokka-pink p-1"><a href="{{ url('procurar/'.strtolower($categorie->name).'/'.$r->details) }}">{{ $categorie->name }} {{ $citys->where('id', $r->details)->first()->name ?? '' }}</a></p>
                  <hr/>
                </li>
              @endforeach 

            </ul>
              </div>
            </li>
 
          @endforeach
          
           
           
          </ul>
          <br/>
            <div class="container">
              <hr/>
            </div>

        </div>
       
     </section>

  <x-page-footer/>
</x-app-layout>
