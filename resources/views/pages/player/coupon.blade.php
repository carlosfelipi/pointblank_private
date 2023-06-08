<div>
    <x-slot:title>
        Cupons
    </x-slot:title>
    <x-slot:css>
        <style>
            .cupons {
                margin-top: 8%;
                margin-bottom: 60px;
            }

            input {
                padding: 20px;
                color: aliceblue;
            }

            .fore-zero .section-wrapper .zero-item {
                padding: 60px;
                background-image: url(/assets/images/bg_award_pb.jpg);
                box-shadow: 0px 0px 10px 0px rgb(255 0 82 / 20%);
                border-radius: 5px;
                background-repeat: no-repeat;
                background-size: cover;

            }

            input {
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                outline: none;
                background: #302f33;
                width: 60%;
            }
        </style>
    </x-slot:css>
    <section class="pageheader-section">
        <div class="container">
            <div class="section-wrapper text-center text-uppercase">
                <h2 class="pageheader-title">Ativação De Cupons</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ativação De Cupons</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="fore-zero padding-top padding-bottom bg page">
        <div class="container">
            <div class="section-wrapper">
                <div class="zero-item">
                    <form wire:submit.prevent="couponProccess">
                        <div class="form-group cupons">
                            <input type="text" placeholder="Obtenha itens digitando o código do cupom aqui"
                                wire:model="code" autocomplete="off">
                            <button type="submit" class="default-button reverse-effect"
                                data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle'
                                data-action='submit'>
                                <span>Ativar</span>
                            </button>
                        </div>
                            @error('code')
                               {{  $this->dispatchBrowserEvent('newMessage', ["msg" =>  $message, "icon" => "error"]); }}
                            @enderror
                    </form>
                </div>

            </div>
        </div>
    </section>
    {{-- <div class="shop-cart padding-top padding-bottom">
        <div class="container">
            <div class="section-wrapper">
                <div class="cart-top">
                    <table>
                        <thead>
                            <tr>
                                <th class="cat-product">Cupom</th>
                                <th class="cat-price">Item</th>
                                <th class="cat-quantity">Quantidade</th>
                                <th class="cat-toprice">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mycodes as $mycode)
                                <tr>
                                    <td class="product-item cat-product">
                                        {{ $mycode->code }}
                                    </td>
                                    <td class="cat-price">{{ $mycode->item_name }}</td>
                                    <td class="cat-quantity">
                                        @if ($mycode->type <= 3)
                                            {{ number_format($mycode->item_count) }}
                                        @else
                                            {{ $item->countDayItem($mycode->item_count) }}
                                        @endif
                                    </td>
                                    <td class="cat-toprice">
                                        {{ $mycode->created_at->format('d-m-Y') }}
                                    </td>
                                   
                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> --}}
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
