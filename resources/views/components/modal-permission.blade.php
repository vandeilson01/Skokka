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

<div id="demo-modal" class="modal">
    <div class="modal__content">
        <h1 class="mb-5 py-0">AVISO AO USUÁRIO</h1>

        <ul>
            <li>A navegação no site só é permitida para maiores de 18 anos de idade.</li>
            <li>Qualquer usuário que carregue material pornográfico envolvendo menores de idade será denunciado imediatamente às autoridades competentes e suspenso da Plataforma.</li>
            <li>Ao publicar um anúncio em Skokka, o Usuário confirma que pode acessar o conteúdo com direitos plenos e também declara que todas as pessoas retratadas na(s) imagem(ns) carregada(s) são maiores de idade (maiores de 18 anos) e que recebeu consentimento para publicá-la(s) em Skokka.</li>
            <li class="mt-5">Ao clicar no botão "Aceitar", o Usuário confirma que é maior de 18 anos e isenta os provedores de serviços, proprietários e criadores de skokka.com de responsabilidade pelo conteúdo e pela utilização deste serviço.</li>
        </ul>

        <div class="modal__footer">
        <button class="no hover:bg-light-500 text-pink-700 font-semibold hover:text-pink py-2 px-4 border border-pink-500 rounded">
            Recusar
        </button>
        <button class="yes hover:bg-pink-500 bg-pink-500 text-pink-700 font-semibold hover:text-light text-white py-2 px-4 border border-pink-500 rounded">
            Aceitar
        </button>
        </div>

      
    </div>
</div>

<script>
    function active() {

        var butY = document.querySelector('.yes');
    
        butY.addEventListener('click', function() {
            sessionStorage.setItem('permissao','YES'); 
            document.location.reload(true);
        });

        var butn = document.querySelector('.no');
    
        butn.addEventListener('click', function() {
            window.location.href = '/';
        });

    }

    active();

    if(sessionStorage.getItem('permissao')){
        var modal = document.querySelector('.modal');
        modal.style.display = 'none';
    }else{
        window.location.href = '#demo-modal';
    }
        
   

    
</script>

</div>