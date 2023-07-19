
@php 
 use App\Models\CategoryPlus;
 use App\Models\Category;
@endphp

<x-acom-layout>
 
<style>
    body {
  margin: 0;
  font-family: sans-serif;
}

.tabs {
  width: 100%;
}

.tab-nav {
  display: flex;
  background: #f0f0f0;
}

.nav-item {
  display: block;
  padding: 16px;
  cursor: pointer;
}
.nav-item.selected {
  font-weight: bold;
  background: #fff;
}

.tab {
  display: none;
  padding: 16px;
}
.tab.selected {
  display: block;
}

.tab-pag {
  padding: 0 16px;
  display: flex;
  justify-content: flex-end;
}

.pag-item {
  display: block;
  padding: 12px;
  cursor: pointer;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 8px;
}
.pag-item:last-child {
  margin-right: 0;
}
.pag-item.hidden {
  display: none;
}

.pag-item-submit {
  flex: 0 1 180px;
  font-size: 1rem;
  color: #fff;
  border-color: #696969;
  background: #696969;
}

</style>

<x-menu-left-acom />
        
  <div class="mt-5 relative md:ml-64 bg-blueGray-50">
     
<section class=" mt-5 container">

<h1 class="font-extrabold text-transparent  text-center text-4xl lg:text-3xl mb-7 bg-clip-text bg-gradient-to-r from-gray-400 to-gray-600">Publique gratuitamente em apenas algumas etapas!</h1>

@if ($errors->any())
<div id="alert-additional-content-2" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
  <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Preencha os campos obrigatorios!</span>
    
    <!-- <h3 class="text-lg font-medium">This is a danger alert</h3> -->
  </div>

  @foreach ($errors->all() as $error)
  <div class="mt-2 mb-4 text-sm">{{ $error }}</div>
    @endforeach
  
</div>   
@endif


<form id="formplus" action="{{ url('acompanhantes/allanuncios/store') }}" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="tabs w-full xl:w-8/12 mb-12 xl:mb-0 px-4" id="tabbedForm">
    <nav class="tab-nav cursor-not-allowed"></nav>
    <div class="tab" data-name="Informações">
        <x-publicar-form1-com/> 
    </div>
    <div class="tab" data-name="Fotos">
        <x-publicar-form2/>
    </div>
    <div class="tab" data-name="Visibilidade">
        <x-publicar-form3/>
    </div>
    <!-- <div class="tab" data-name="Confirmar">
        <x-publicar-form4/>
    </div> -->
    <nav class="tab-pag"></nav>
  </div>
</form>

<br/>
<br/>
<br/>
<br/>
<br/>



</section>   

</div>


<x-page-footer/>


<script>
  
var tabs = function(id) {
  this.el = document.getElementById(id);
  
  this.tab = {
    el: '.tab',
    list: null
  }
  
  this.nav = {
    el: '.tab-nav',
    list: null
  }
  
  this.pag = {
    el: '.tab-pag',
    list: null
  }
  
  this.count = null;
  this.selected = 0;
  
  this.init = function() {
    // Create tabs
    this.tab.list = this.createTabList();
    this.count = this.tab.list.length;
    
    // Create nav
    this.nav.list = this.createNavList();
    this.renderNavList();
    
    // Create pag
    this.pag.list = this.createPagList();
    this.renderPagList();
    
    // Set selected
    this.setSelected(this.selected);
  }
  
  this.createTabList = function() {
    var list = [];
    
    this.el.querySelectorAll(this.tab.el).forEach(function(el, i) {
      list[i] = el;
    });
    
    return list;
  }
  
  this.createNavList = function() {
    var list = [];
    
    this.tab.list.forEach(function(el, i) {
      var listitem = document.createElement('a');
          listitem.className = 'nav-item',
          listitem.innerHTML = el.getAttribute('data-name'),
          listitem.onclick = function() {
            this.setSelected(i);
            return false;
          }.bind(this);
      
      list[i] = listitem;
    }.bind(this));
    
    return list;
  }
  
  this.createPagList = function() {
    var list = [];
    
    list.prev = document.createElement('a');
    list.prev.className = 'pag-item pag-item-prev',
      list.prev.innerHTML = 'Voltar',
      list.prev.onclick = function() {
      this.setSelected(this.selected - 1);
      return false;
    }.bind(this);

    list.next = document.createElement('a');
    list.next.className = 'pag-item pag-item-next',
      list.next.innerHTML = 'Continuar',
      list.next.onclick = function() {
      this.setSelected(this.selected + 1);
      return false;
    }.bind(this);
    
    list.submit = document.createElement('button');
    list.submit.className = 'pag-item pag-item-submit',
    list.submit.innerHTML = '';
    
    return list;
  }
  
  this.renderNavList = function() {
    var nav = document.querySelector(this.nav.el);
    
    this.nav.list.forEach(function(el) {
      nav.appendChild(el);
    });
  }
  
  this.renderPagList = function() {
    var pag = document.querySelector(this.pag.el);
    
    pag.appendChild(this.pag.list.prev);
    pag.appendChild(this.pag.list.next);
    pag.appendChild(this.pag.list.submit);
  }
  
  this.setSelected = function(target) {
    var min = 0,
        max = this.count - 1;
    
    if(target > max || target < min) {
      return;
    }
    
    if(target == min) {
      this.pag.list.prev.classList.add('hidden');
    } else {
      this.pag.list.prev.classList.remove('hidden');
    }
    
    if(target == max) {
      this.pag.list.next.classList.add('hidden');
      this.pag.list.submit.classList.remove('hidden');
    } else {
      this.pag.list.next.classList.remove('hidden');
      this.pag.list.submit.classList.add('hidden');
    }
    
    this.tab.list[this.selected].classList.remove('selected');
    this.nav.list[this.selected].classList.remove('selected');

    this.selected = target;
    this.tab.list[this.selected].classList.add('selected');
    this.nav.list[this.selected].classList.add('selected');
  }
};

var tabbedForm = new tabs('tabbedForm');
tabbedForm.init();
 

</script> 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
 
        $(document).ready(function () {

            $('#states').on('change', function () {
                var idState = this.value;
                $("#citys").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#citys').html('<option value="">-- Selecionar Cidade --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#citys").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            })
            
  
            
        });


        //validation


        const usernameEl = document.querySelector('#username');
        const emailEl = document.querySelector('#email');
        const passwordEl = document.querySelector('#password');
        const confirmPasswordEl = document.querySelector('#confirm-password');

        const form = document.querySelector('#signup');


        const checkUsername = () => {

            let valid = false;

            const min = 3,
                max = 25;

            const username = usernameEl.value.trim();

            if (!isRequired(username)) {
                showError(usernameEl, 'Username cannot be blank.');
            } else if (!isBetween(username.length, min, max)) {
                showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
            } else {
                showSuccess(usernameEl);
                valid = true;
            }
            return valid;
        };


        const checkEmail = () => {
            let valid = false;
            const email = emailEl.value.trim();
            if (!isRequired(email)) {
                showError(emailEl, 'Email cannot be blank.');
            } else if (!isEmailValid(email)) {
                showError(emailEl, 'Email is not valid.')
            } else {
                showSuccess(emailEl);
                valid = true;
            }
            return valid;
        };

        const checkPassword = () => {
            let valid = false;


            const password = passwordEl.value.trim();

            if (!isRequired(password)) {
                showError(passwordEl, 'Password cannot be blank.');
            } else if (!isPasswordSecure(password)) {
                showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
            } else {
                showSuccess(passwordEl);
                valid = true;
            }

            return valid;
        };

        const checkConfirmPassword = () => {
            let valid = false;
            // check confirm password
            const confirmPassword = confirmPasswordEl.value.trim();
            const password = passwordEl.value.trim();

            if (!isRequired(confirmPassword)) {
                showError(confirmPasswordEl, 'Please enter the password again');
            } else if (password !== confirmPassword) {
                showError(confirmPasswordEl, 'The password does not match');
            } else {
                showSuccess(confirmPasswordEl);
                valid = true;
            }

            return valid;
        };

        const isEmailValid = (email) => {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };

        const isPasswordSecure = (password) => {
            const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            return re.test(password);
        };

        const isRequired = value => value === '' ? false : true;
        const isBetween = (length, min, max) => length < min || length > max ? false : true;


        const showError = (input, message) => {
            // get the form-field element
            const formField = input.parentElement;
            // add the error class
            formField.classList.remove('success');
            formField.classList.add('error');

            // show the error message
            const error = formField.querySelector('small');
            error.textContent = message;
        };

        const showSuccess = (input) => {
            // get the form-field element
            const formField = input.parentElement;

            // remove the error class
            formField.classList.remove('error');
            formField.classList.add('success');

            // hide the error message
            const error = formField.querySelector('small');
            error.textContent = '';
        }


        form.addEventListener('submit', function (e) {
            // prevent the form from submitting
            e.preventDefault();

            // validate fields
            let isUsernameValid = checkUsername(),
                isEmailValid = checkEmail(),
                isPasswordValid = checkPassword(),
                isConfirmPasswordValid = checkConfirmPassword();

            let isFormValid = isUsernameValid &&
                isEmailValid &&
                isPasswordValid &&
                isConfirmPasswordValid;

            // submit to the server if the form is valid
            if (isFormValid) {

            }
        });


        const debounce = (fn, delay = 500) => {
            let timeoutId;
            return (...args) => {
                // cancel the previous timer
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }
                // setup a new timer
                timeoutId = setTimeout(() => {
                    fn.apply(null, args)
                }, delay);
            };
        };

        form.addEventListener('input', debounce(function (e) {
            switch (e.target.id) {
                case 'username':
                    checkUsername();
                    break;
                case 'email':
                    checkEmail();
                    break;
                case 'password':
                    checkPassword();
                    break;
                case 'confirm-password':
                    checkConfirmPassword();
                    break;
            }
        }));

 
    </script>
</x-acom-layout>
