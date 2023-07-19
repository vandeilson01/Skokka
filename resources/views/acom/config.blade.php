<x-acom-layout>

    <div id="root">
        
        <x-menu-left-acom />

      <div class="relative md:ml-64 bg-blueGray-50">
       
      <x-menu-top-acom />
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <form class="" action="{{ url('acompanhantes/user/update') }}" method="post">

        @csrf


          <div class="flex flex-wrap">
            <div class="w-full lg:w-8/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
              >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                  <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                      Meus Dados 
                    </h6>
                    <button
                      class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                      type="submit"
                    >
                      Salvar
                    </button>
                  </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                 
                    <h6
                      class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
                    >
                      Informações Pessoais
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Nome
                          </label>
                          <input
                            type="text"
                            name="name"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ Auth::guard('acom')->user()->name ?? ''}}"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Email
                          </label>
                          <input
                            type="email"
                            name="email"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value="{{ Auth::guard('acom')->user()->email ?? ''}}"
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Nova Senha
                          </label>
                          <input
                            type="password"
                            name="password"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value=""
                          />
                        </div>
                      </div>
                      <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            Repetir Nova Senha
                          </label>
                          <input
                            type="password"
                            name="passwordtwo"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            value=""
                          />
                        </div>
                      </div>
                    </div>
 

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <!-- <h6
                      class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase"
                    >
                      About Me
                    </h6>
                    <div class="flex flex-wrap">
                      <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                          <label
                            class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            htmlFor="grid-password"
                          >
                            About me
                          </label>
                          <textarea
                            type="text"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            rows="4"
                          >
                                A beautiful UI Kit and acom-layout for JavaScript & Tailwind CSS. It is Free
                                and Open Source.
                              </textarea
                          >
                        </div>
                      </div>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16"
              >
                <div class="px-6">
                  <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                      <!-- <div class="relative">
                        <img
                          alt="..."
                          src="../../assets/img/team-2-800x800.jpg"
                          class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                        />
                      </div> -->
                    </div>
                    <div class="w-full px-4 text-center mt-20">
                      <div class="flex justify-center py-4 lg:pt-4 pt-8">
                        <!-- <div class="mr-4 p-3 text-center">
                          <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            22
                          </span>
                          <span class="text-sm text-blueGray-400">Friends</span>
                        </div> -->
                        <div class="mr-4 p-3 text-center">
                          <!-- <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            10
                          </span>
                          <span class="text-sm text-blueGray-400">Fotos</span> -->
                        </div>
                        <!-- <div class="lg:mr-4 p-3 text-center">
                          <span
                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"
                          >
                            89
                          </span>
                          <span class="text-sm text-blueGray-400"
                            >Comments</span
                          >
                        </div> -->
                      </div>
                    </div>
                  </div>
                  
                  <div
                    class="mt-10 py-10 border-t border-blueGray-200 text-center"
                  >
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <x-footer-adm/>

        </form>
        </div>
      </div>
          
          
     
    </div>
</x-acom-layout>