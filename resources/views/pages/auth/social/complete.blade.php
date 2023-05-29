<div>
    <x-slot:title>
        Completar Minha Conta
    </x-slot:title>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Completar Minha Conta</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Completar Minha Conta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="login-section padding-top padding-bottom">
        <div class=" container">
            <div class="account-wrapper">
                @if ($this->account() !== null)
                    <img class="provider-avatar" src="{{ $this->account()->provider_avatar }}"
                        title="{{ $this->account()->provider_name }}" alt="photo" />
                    <h3 class="title">
                        Olá <b>{{ $this->account()->provider_name }}</b>
                    </h3>
                @else
                    <h3 class="title">
                        Completar Minha Conta
                    </h3>
                @endif
                <form class="account-form" wire:submit.prevent="completeSocialProccess">
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
                            <span wire:loading.remove wire:target="completeSocialProccess">
                                <i class="fa fa-arrow-right"></i>
                                Continuar
                            </span>
                            <span wire:loading wire:target="completeSocialProccess">
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
