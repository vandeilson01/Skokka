@php
    $acompanhantes = App\Models\AcompanhantesModel::all();
    $categorias = App\Models\Category::all();
    $states = App\Models\State::all();
    $citys = App\Models\City::all();
   
@endphp

<div>
    <h4 class="font-extrabold text-transparent text-4xl lg:text-3xl mb-7 bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Seu anúncio</h1>

    <div class="anuncios-page grid gap-6 mb-6 xl:w-4/1">
        <div>
            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Selecionar categoria</label>

            <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($categorias as $r)
                    <option value="{{ $r->id }}">{{ $r->name}}</option>
                @endforeach
            </select>
           
        </div>
        <div>
            <label for="states" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Selecionar Estado</label>
            <select name="estado" id="states" class="block border-zinc-200  font-medium text-gray-400 rounded w-1/2">
              @foreach ($states as $state)
              <option class="city{{ $state->id }}" value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
            </select>
            
        </div>
        <div>
            <label for="citys" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Selecionar Cidade</label>
            <select name="cidade" id="citys" class="city block border-zinc-200  font-medium text-gray-400 rounded w-1/2">
              @foreach ($citys->where('state_id', 14) as $city)
                <option class="state{{ $city->id }}" value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
        </div>
        <div>
            <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Endereço"  >
        </div>  
        <div>
            <label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código postal(CEP)</label>
            <input type="tel" name="cep" id="cep" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CEP">
        </div>
        <div>
            <label for="distrito" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área/distrito/bairro</label>
            <input type="text" name="distrito" id="distrito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Área/Bairro/Distrito/"  >
        </div>
            
    </div>


    <div class="grid gap-6 mb-6 ">
        <h4 class="font-extrabold text-transparent  text-4xl lg:text-3xl mb-7 bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Seus dados</h1>

        <div>
            <label for="idade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Idade</label>
            <input type="number" id="idade" name="idade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Idade"  >
        </div>
        <div>
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Título</label>
            <input type="text" id="titulo" name="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dê um bom título ao seu anúncio"  >
        </div>
        <div>
            <label for="texto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">* Texto</label>
            <textarea id="texto" name="texto" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Use este espaço para descrever a si mesmo e seu corpo, falar de suas habilidades, do que gosta..."></textarea>
        </div>  
            
    </div>

    <div class="grid gap-6 mb-6 border-gray-700">

        <h4 class="font-extrabold text-transparent  text-4xl lg:text-3xl mb-7 bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Seus contatos</h1>

        
        <h1>Como deseja que entrem em contato com você?</h1>

        <!-- <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input checked id="tel" type="radio" name="tipo_contato" value="tel" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="tel" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Somente telefone</label>
            </div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input checked id="tel_email" type="radio" name="tipo_contato" value="tel_email" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="tel_email" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail e telefonee</label>
            </div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input checked id="email" type="radio" name="tipo_contato" value="email" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="email" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Somente e-mail</label>
            </div>
        </div> -->
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Endereço de e-mail</label>
            <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email"  >
            <small>Não visível online</small>
        </div>
        <div>
            <label for="num_tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> <small class="tel"></small> Número de telefone</label>
            <input type="text" id="num_tel" name="num_tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00 0 00000000"  >
        </div>
        <div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="e_whatsapp" type="checkbox" value="sim" name="e_whatsapp" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="e_whatsapp" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Esse é seu whatsapp ?</label>
            </div>
        </div>  


        <div>
            <label for="pass_i" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> * Senha</label>
            <input type="text" id="pass_i" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00 0 00000000"  >
        </div>
        <div>
            <label for="pass_t" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> * Confirmar Senha</label>
            <input type="text" id="pass_t" name="passwordtwo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="00 0 00000000"  >
        </div>
         

        <!-- <div class="col-12"><div id="hcap-script" loadrecaptchascript="true" class="d-inline-block captcha-component captcha-hcaptcha"><iframe src="https://newassets.hcaptcha.com/captcha/v1/0d18f92/static/hcaptcha.html#frame=checkbox&amp;id=0u28cji861pf&amp;host=br.skokka.com&amp;sentry=true&amp;reportapi=https%3A%2F%2Faccounts.hcaptcha.com&amp;recaptchacompat=off&amp;custom=false&amp;hl=pt&amp;tplinks=on&amp;sitekey=ced407c5-238b-4144-9b59-4dcd58092d36&amp;size=normal&amp;theme=light&amp;origin=https%3A%2F%2Fbr.skokka.com" tabindex="0" frameborder="0" scrolling="no" title="Widget contendo caixa de seleção para desafio de segurança hCaptcha" data-hcaptcha-widget-id="0u28cji861pf" data-hcaptcha-response="" style="width: 303px; height: 78px; overflow: hidden;"></iframe><textarea id="h-captcha-response-0u28cji861pf" name="h-captcha-response" style="display: none;"></textarea></div></div> -->
            
    </div> 
    <div class="grid gap-6 mb-6 border-gray-700">
        <div>
            <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="bordered-checkbox-2" type="checkbox" value="sim" name="e_termos" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="bordered-checkbox-2" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concorda com os termos ?</label>
            </div>
            <ul>
                <li>
                    *Termos, Condições e Política de Privacidade<br/>
                    Li os <a class="text-purple-700" href="{{ url('acompanhantes/termos') }}">Termos e Condições</a> de uso e a <a class="text-purple-700" href="{{ url('acompanhantes/termos') }}">Política de Privacidade</a> e autorizo o processamento dos meus dados pessoais para o fornecimento deste serviço na web.

                    <br/><br/><br/>
                    NÃO É PERMITIDO:<br/>
                    Inserir anúncios de acompanhantes ou similares
                    Fazer referências a serviços sexuais pagos.
                    Inserir links nos anúncios (clicáveis ou não).
                    Inserir textos ou imagens ofensivos ou vulgares.
                    O usuário confirma que é maior de idade de acordo com sua jurisdição e que não foi forçado, de maneira alguma, a criar este perfil
                    O usuário confirma que não oferecerá nenhum serviço contrário à legislação em sua região
                </li>
            </ul>
            
        </div> 
    </div>
             
</div>