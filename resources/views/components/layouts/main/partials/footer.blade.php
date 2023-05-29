<footer class="footer-section">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-content text-center">
                        <p>
                            Copyright &copy; {{ date('Y') }} <a
                                href="{{ env('DISCORD_URL') }}">{{ env('APP_NAME') }}</a> -
                            Build v{{ Illuminate\Foundation\Application::VERSION }} Author <span class="author">
                                !Feliphe#3110
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
