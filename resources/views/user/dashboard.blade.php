@php 
 use App\Models\CategoryPlus;
 use App\Models\Category;

 $categories = Category::get();
@endphp

<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->

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
                <p class="text-shokka-pink p-1"><a href="{{ url('procurar/'.$r->link) }}">{{ $categorie->name }} {{ $r->details }}</a></p>
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
                <p class="text-shokka-pink p-1"><a href="{{ url('procurar/'.$r->link) }}">{{ $categorie->name }} {{ $r->details }}</a></p>
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


     <button onclick="topFunction()" id="myBtn" title="Go to top"></button>

     
<footer class="bg-white rounded-lg  dark:bg-gray-900 md:py-8 m-4 mb-5">
    <div class="w-full container mx-auto    md:py-8 mb-5">
        <div class=" sm:items-center sm:justify-between">
            <ul class="flex flex-wrap items-center mb-5 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Termos e Condições</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Política de Privacidadey</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Fale conosco</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Gerenciar seus anúncios</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Promover seus anúncios</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Promover seus anúncios</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Helpe</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>


            <ul class="flex flex-wrap items-center mt-5 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Siga-nos:</a>
                </li>
                 
            </ul>

            <div class="flex items-center justify-start space-x-2 mt-5 mb-5">
  
   
  <!-- Facebook -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="h-7 w-7"
    fill="currentColor"
    style="color: #1877f2"
    viewBox="0 0 24 24">
    <path
      d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
  </svg>


  <!-- Twitter -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="h-7 w-7"
    fill="currentColor"
    style="color: #1da1f2"
    viewBox="0 0 24 24">
    <path
      d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
  </svg>

  <!-- Instagram -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="h-7 w-7"
    fill="currentColor"
    style="color: #c13584"
    viewBox="0 0 24 24">
    <path
      d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
  </svg>


  <!-- Whatsapp -->
  <svg
    xmlns="http://www.w3.org/2000/svg"
    class="h-7 w-7"
    fill="currentColor"
    style="color: #128c7e"
    viewBox="0 0 24 24">
    <path
      d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
  </svg>
 
</div>

        </div>
    </div>
</footer>



     <script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('accordion', {
        tab: 0
      });
      
      Alpine.data('accordion', (idx) => ({
        init() {
          this.idx = idx;
        },
        idx: -1,
        handleClick() {
          this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
        },
        handleRotate() {
          return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
        },
        handleToggle() {
          return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
        }
      }));
    })


  </script>
</x-app-layout>
