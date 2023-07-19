@php 
 use App\Models\PlansModel;
 use App\Models\AnunciosHorarios;
@endphp

<div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <h4 class="font-extrabold text-transparent text-4xl lg:text-2xl mb-7 bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Seu anúncio</h1>
    </div>

    <a href="#demo-s" class=" block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Exemplo anúncio
    </a>

    <x-exemplo-anuncio />
    <div class="visibilidade-page grid gap-6 mb-6 mt-5 md:grid-cols-2">

        <!-- <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
     
        </div> -->

        <ul class="grid w-full gap-6 md:grid-cols-2">
            @foreach(PlansModel::all() as $row)
            <li>
                <input onClick="mais('radioplan{{$row->id}}')" type="radio" id="radioplan{{$row->id}}" name="plan" value="{{ $row->id}}" class="hidden peer">
                <label for="radioplan{{$row->id}}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                    <div class="block">
                        <div class="w-full text-lg font-semibold vezes">{{ $row->name }}</div>
                        <div class="w-full descricao">{{ $row->brev }}</div>

                        <div class="w-full text-lg font-semibold descricao">{{ $row->abrev }}</div>
                        <div class="w-full text-sm">R$ <span class="valor">{{ $row->value }}</span> (<pan class="credit">{{ $row->credit }}<span> créditos)</div>
                    </div>
                    <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </label>

                <select id="radioplan{{$row->id}}" name="" disabled class="radioplan bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach(AnunciosHorarios::all() as $h)
                        <option value="{{$h->id}}">{{$h->start}} - {{$h->end}} </option>
                    @endforeach
                </select>
                
            </li>

            @endforeach
 
        </ul>
 

        <div class="grid res gap-6 mb-6 md:grid-cols-2 float-right">

            <a class="text-left block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Promoções</h5>
                <p>TOTAL:</p>
                <p>Top <span class="vezes"></span></p> 
                <p class="selecione">Selecione a faixa horária</p>

                <p>R$<span class="valor"></span>(<span class="credit"></span> créditos)</p>

                <button type="button" class="cadastro relative bg-pink-700 inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        COMPRAR E PUBLICAR
                    </span>
                </button>
            </a>

        </div>
    </div>

   
</div>

<script>

    var se = document.querySelectorAll('.radioplan');
    
    for (var i = 0, len = se.length; i < len; i++) {
        se[i].style.display = 'none';
    }


    function mais(names) {

        for (var i = 0, len = se.length; i < len; i++) {
            se[i].style.display = 'none';
            se[i].name = '';
        }
 
        var u = document.querySelector('select[id="'+names+'"]');
        u.style.display = 'block';
        u.name = 'plan_time';
        u.removeAttribute("disabled");

        var res_vezes = document.querySelector('.res .vezes');
        var res_valor = document.querySelector('.res .valor');
        var res_credit = document.querySelector('.res .credit');

        var selecione = document.querySelector('.res .selecione');
        selecione.style.display = 'none';
        
        var vezes = document.querySelector('[for="'+names+'"] .vezes');
        var descricao = document.querySelector('[for="'+names+'"] .descricao');
        var valor = document.querySelector('[for="'+names+'"] .valor');
        var credit = document.querySelector('[for="'+names+'"] .credit');

        res_vezes.textContent = vezes.textContent;
        res_valor.textContent = valor.textContent;
        res_credit.textContent = credit.textContent;
        
    }

</script>