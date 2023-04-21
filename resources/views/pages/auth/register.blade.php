<x-slot:css>
    @livewireStyles()
</x-slot:css>
<article class="input">
    <section class="pageHead_logo">
        <h2>
            <a href="{{ route('indexPage') }}">
                <img class="ie" src="{{ asset('assets/img/bi_wide_new_ie.png') }}" title="{{ $config->name }}"
                    alt="bi_wide_new_ie" />
            </a>
        </h2>
    </section>
    <form class="dev_check_enter" wire:submit.prevent="registerProccess">
        <ul>
            <li>
                <label for="id">Usuário</label>
                <input type="text" wire:model='login' class="hasBtn" placeholder="Introduzca su usuario.">
                <x-alerts.error input="login"/>
            </li>
            <li class="in_btn">
                <label for="pw">Contraseña</label>
                <input type="password" wire:model='password' id="password"placeholder="Ingresa tu contraseña." />
                <x-alerts.error input="password"/>
                <button type="button" class="eyes" onclick="switchPwd('password');">
                    <img src="{{ asset('assets/img/icon_eye_rd.png') }}" alt="icon_eye_rd" />
                </button>
            </li>
            <li class="in_btn">
                <label for="cpw">Confirmar la contraseña</label>
                <input type="password" wire:model='confirm' id="repassword" placeholder="Confirmar la contraseña." />
                <x-alerts.error input="confirm"/>
                <button type="button" class="eyes" onclick="switchPwd('repassword');">
                    <img src="{{ asset('assets/img/icon_eye_rd.png') }}" alt="icon_eye_rd" />
                </button>
            </li>
            <li>
                <label for="email">correo electrónico</label>
                <input type="email" wire:model='email' class="hasBtn" placeholder="Inserta tu correo electronico." />
                <x-alerts.error input="email"/>
            </li>
            <li class="accept">
                <input type="checkbox" wire:model='term' id="join_agree">
                <p>He acordado
                    <a href="/eula/terms">Términos de servicio</a> e
                    <a href="/eula/privacy">Política de privacidad.</a>
                </p>
            </li>
            <li class="term">
                <x-alerts.error input="term"/>
            </li>
            <li class="btn">
                <button class="submit">
                    <span wire:loading.remove wire:target="registerProccess">
                        REGISTRO
                    </span>
                    <span wire:loading wire:target="registerProccess">
                        {{-- <div class="loding" style="display: block;">
                            <p><img src="/assets/img/loading.gif" alt="Loading"></p>
                        </div> --}}
                        <i class="fa fa-circle-o-notch fa-spin" style="font-size: inherit;"></i> ESPERAR...
                    </span>
                </button>
            </li>
        </ul>
    </form>
</article>
<x-slot:js>
    @livewireScripts()
</x-slot:js>
