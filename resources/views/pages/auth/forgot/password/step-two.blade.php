<div>
    <x-slot:title>
        adastrar Nova Senha
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Cadastrar Nova Senha</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastrar Nova Senha</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="account-wrapper">
                <h3 class="title">Cadastrar Nova Senha</h3>
                <form class="account-form" wire:submit.prevent="newPasswordProccess">
                    @csrf
                    <div class="form-group">
                        <input type="password" placeholder="Nova Senha" wire:model="password" />
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirmar Nova Senha" wire:model="confirmation" />
                        @error('confirmation')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @error('token')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="d-block default-button" type="submit"
                            data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle' data-action='submit'>
                            <span wire:loading.remove wire:target="newPasswordProccess">
                                <i class="fa fa-arrow-right"></i>
                                Confirmar
                            </span>
                            <span wire:loading wire:target="newPasswordProccess">
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
