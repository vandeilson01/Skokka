<div>
<style>

.wrapper {
  height: 140vh;
  /* This part is important for centering the content */
  display: flex;
  align-items: center;
  justify-content: center;
  /* End center */
  background: -webkit-linear-gradient(to right, #834d9b, #d04ed6);
  background: linear-gradient(to right, #834d9b, #d04ed6);
}

.wrapper a {
  display: inline-block;
  text-decoration: none;
  padding: 15px;
  background-color: #fff;
  border-radius: 3px;
  text-transform: uppercase;
  color: #FFFFFF;
  font-family: 'Roboto', sans-serif;
}

.modal {
  visibility: hidden;
  opacity: 0;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(77, 77, 77, .7);
  transition: all .4s;
}

.modal:target {
  visibility: visible;
  opacity: 1;
}

.modal__content h1{
    font-size: 18px;
    font-weight: 600;
}
.modal__content {
  border-radius: 4px;
  position: relative;
  width: 90%;
  max-width: 90%;
  background: #fff;
  padding: 1em 2em;
}

.modal__footer {
  text-align: right;
  
}

.modal__footer a {
    color: #585858;
  }
.modal__footer i {
    color: #d02d2c;
  }
.modal__close {
  position: absolute;
  top: 10px;
  right: 10px;
  color: #585858;
  text-decoration: none;
}
</style>
<!-- 
<div class="wrapper">
    <a href="#demo-modal">Open Demo Modal</a>
</div> -->

<div id="demo-s" class="modal" style="z-index: 100;">
<div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Exemplo do Anúncio
                </h3>
                <a href="#" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </a>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-center leading-relaxed text-gray-500 dark:text-gray-400">
                <div class="modal-body pb-0">
                    <h4 class="text-center">
                        <p class="mt-2">Descubra os benefícios do TOP:</p></h4> 
                        <div class="lightboxpromuovitop" style="width: 90%;height: 200px;background-image: url('{{url('desk.png')}}');"></div> 
                        <div class="row mt-4 indigo">
                            <div class="sfondotop light">
                                <ol class="list-numbered"><li>
                            Anúncio entre os <b>primeiros resultados da pesquisa</b>
                        </li> 
                        <li>
                            <b>Mais visibilidade</b> graças à foto de visualização
                        </li> 
                        <li>
                            <b>Visibilidade</b> na página de detalhes de anúncios gratuitos
                        </li>
                    </ol>
                </div>
            </div> 
                <div class="col mt-3 text-center"><p>
                        Alcance as primeiras posições da lista de anúncios! O anúncio TOP é o anúncio aprimorado. Diferentemente do gratuito, o TOP envia seu anúncio automaticamente para as posições superiores da primeira página.
                    </p> 
                    <p>
                        Se quiser ficar mais visível, economizar tempo e receber mais contatos, promova seu anúncio para aumentar a visibilidade dele com apenas alguns cliques.
                    </p>
                </div>
            </div>
        </p>
                 
            </div>
            <!-- Modal footer -->
            <!-- <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div> -->
        </div>
    </div>
</div>

</div>