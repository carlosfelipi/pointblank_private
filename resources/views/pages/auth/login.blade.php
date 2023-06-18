<div>
    <x-slot:title>
        Entrar
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">entrar</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Entrar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Entrar</h3>
                <form class="account-form" wire:submit.prevent="loginProcess">
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
                        <div class="input-group">
                            <input type="{{ $showPassword ? 'text' : 'password' }}" placeholder="Senha"
                                wire:model="password" />
                            <div class="input-group-append">
                                <button type="button" wire:click="togglePasswordVisibility"
                                    class="btn btn-outline-secondary password-toggle-button">
                                    <i class="fa {{ $showPassword ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                            <a href="{{ route('forgotPasswordStepOnePage') }}">Esqueceu sua senha?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="d-block default-button" type="submit"
                            data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle' data-action='submit'>
                            <span wire:loading.remove wire:target="loginProcess">
                                <i class="fa fa-arrow-right"></i>
                                Entrar
                            </span>
                            <span wire:loading wire:target="loginProcess">
                                <i class="fa fa-circle-o-notch fa-spin" style="font-size: inherit;"></i>
                                Aguarde...
                            </span>
                        </button>
                    </div>
                </form>
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
