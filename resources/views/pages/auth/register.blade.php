<div>
    <x-slot:title>
        Cadastro
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Cadastro</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Cadastro</h3>
                <form class="account-form" wire:submit.prevent="registerProccess">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Usuário" wire:model="login" />
                        @error('login')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="E-mail" wire:model="email" />
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Senha" wire:model="password" />
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirmar Senha" wire:model="confirmation" />
                        @error('confirmation')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                            <div class="checkgroup">
                                <input type="checkbox" wire:model="term" />
                                <label for="remember">
                                    Eu concordei com os <a href="{{ route('termsPage') }}">Termos de serviço</a>.
                                </label>
                            </div>
                        </div>
                        @error('term')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="d-block default-button" type="submit"
                            data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle' data-action='submit'>
                            <span wire:loading.remove wire:target="registerProccess">
                                <i class="fa fa-arrow-right"></i>
                                COMECE AGORA
                            </span>
                            <span wire:loading wire:target="registerProccess">
                                <i class="fa fa-circle-o-notch fa-spin" style="font-size: inherit;"></i>
                                Aguarde...
                            </span>
                        </button>
                    </div>
                </form>
                <div class="account-bottom">
                    <span class="d-block cate pt-10">
                        Já tem uma conta?
                        <a href="{{ route('loginPage') }}">
                            Fazer login
                        </a>
                    </span>
                    <span class="or">
                        <span>OU</span>
                    </span>
                    <h5 class="subtitle">
                        Cadastro Com Redes Sociais
                    </h5>
                    <ul class="share lab-ul justify-content-center">
                        <li>
                            <a href="{{ route('redirectProvider', ['provider' => 'facebook']) }}" class="facebook">
                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                        fill="white">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('redirectProvider', ['provider' => 'google']) }}" class="google">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                    fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path
                                        d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('redirectProvider', ['provider' => 'discord']) }}" class="discord">
                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
                                    <path
                                        d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"
                                        fill="white">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('redirectProvider', ['provider' => 'github']) }}" class="github">
                                <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                                        fill="white"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <x-slot:js>
        <script src="//www.google.com/recaptcha/api.js?render={{ env('CAPTCHA_SITE_KEY') }}"></script>
        <script>
            function handle(e) {
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ env('CAPTCHA_SITE_KEY') }}', {
                        action: 'submit'
                    })
                })
            }
        </script>
    </x-slot:js>
</div>
