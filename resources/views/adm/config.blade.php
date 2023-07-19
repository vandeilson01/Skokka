<x-admin>

    <div id="root">
        
        <x-menu-left-adm />

      <div class="relative md:ml-64 bg-blueGray-50">
       
      <x-menu-top-adm />
        <!-- Header -->
        <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            
          </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap">
            <div class="w-full lg:w-2/2 px-4">
             
                 
                <form class="" action="{{ url('admin/user/update') }}" method="post">

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
              <!-- <div class="w-full lg:w-6/12 px-4"> -->
                <!-- <div class="relative w-full mb-3">
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
                    value="{{ Auth::guard('admin')->user()->name ?? ''}}"
                  />
                </div>
              </div> -->
              <div class="w-full lg:w-12/12 px-4">
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
                    value="{{ Auth::guard('admin')->user()->email ?? ''}}"
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
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16"
              >
                 
              </div>
            </div>
          </div>

          <x-footer-adm/>

        </div>
      </div>
          
          
     
    </div>
</x-admin>