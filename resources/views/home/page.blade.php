<x-app-layout>
     <section class="space-y-2">
        <h1 class="font-extrabold text-transparent  text-center text-4xl lg:text-6xl bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Encontros quentes na sua cidade</h1>
        <h5 class="text-center text-base font-medium">Tenha um encontro hoje em sua cidade, escolha sua categoria</h5>
     </section>
     <section>
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('categories/womenseekmen_repr.jpg') }}" alt="Acompanhantes">
                <div class="px-0 py-0">
                  <div class="text-2xl mb-2 bg-shokka-pink text-white font-semibold pt-2 flex  items-center px-3 py-2">Acompanhantes</div>
                  <p class="text-gray-700 text-base px-3">
                    Encontre as melhores acompanhantes do Brasil, que te oferecem grande variedade de serviços eróticos. Não espere mais!
                  </p>
                </div>
              </div>
        </div>
     </section>
</x-app-layout>
