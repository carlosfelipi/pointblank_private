<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#F9F9F9;"
    id="bodyTable">
    <tbody>
        <tr>
            <td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">

                <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%"
                    class="wrapperWebview">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                                <!-- Content Table Open // -->
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="right" valign="middle"
                                                style="padding-top: 20px; padding-right: 0px;" class="webview">
                                                <!-- Email View in Browser // -->
                                                <a class="text hideOnMobile" href="#" target="_blank"
                                                    style="color:#777777; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none; text-align:right; text-decoration:underline; padding:0; margin:0">
                                                    ATENÇÃO: Este é um e-mail automático. Por favor, não o responda →
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Content Table Close // -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Email Wrapper Webview Close //-->

                <!-- Email Wrapper Header Open //-->
                <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%"
                    class="wrapperWebview">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Email Wrapper Header Close //-->

                <!-- Email Wrapper Body Open // -->
                <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%"
                    class="wrapperBody">
                    <tbody>
                        <tr>
                            <td align="center" valign="top">

                                <!-- Table Card Open // -->
                                <table border="0" cellpadding="0" cellspacing="0"
                                    style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;"
                                    width="100%" class="tableCard">

                                    <tbody>
                                        <tr>
                                            <!-- Header Top Border // -->
                                            <td height="3"
                                                style="background-color:#003CE5;font-size:1px;line-height:3px;"
                                                class="topBorder">&nbsp;</td>
                                        </tr>


                                        <tr>
                                            <td align="center" valign="top" style="padding-bottom: 20px;"
                                                class="imgHero">
                                                <!-- Hero Image // -->
                                                <a href="#" target="_blank" style="text-decoration:none;">
                                                    <img src="http://weekly.grapestheme.com/notify/img/hero-img/blue/heroFill/notification-reminder.png"
                                                        width="600" alt="" border="0"
                                                        style="width:100%; max-width:600px; height:auto; display:block;">
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top"
                                                style="padding-bottom:5px;padding-left:20px;padding-right:20px;"
                                                class="mainTitle">
                                                <!-- Main Title Text // -->
                                                <h2 class="text"
                                                    style="color:#000000; font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:28px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:36px; text-transform:none; text-align:center; padding:0; margin:0">
                                                    Olá {{ $temporary->login }}
                                                </h2>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top"
                                                style="padding-bottom: 30px; padding-left: 20px; padding-right: 20px;"
                                                class="subTitle">
                                                <!-- Sub Title Text // -->
                                                <h4 class="text"
                                                    style="color:#999999; font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:24px; text-transform:none; text-align:center; padding:0; margin:0">
                                                    Verifique sua conta no {{ $config->name }}
                                                </h4>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center" valign="top"
                                                style="padding-left:20px;padding-right:20px;"
                                                class="containtTable ui-sortable">

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                    class="tableDescription" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="padding-bottom: 20px;" class="description">
                                                                <!-- Description Text// -->
                                                                <p class="text"
                                                                    style="color:#666666; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:14px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none; text-align:center; padding:0; margin:0">
                                                                    Obrigado por se cadastrar no
                                                                    {{ $config->name }}.
                                                                    Por favor, clique no botão confirmar para completar
                                                                    seu cadastro e aproveite nosso jogo.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                    class="tableDescription" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="padding-bottom: 20px;" class="description">
                                                                <!-- Description Text// -->
                                                                <p class="text"
                                                                    style="color:#666666; font-family:'Open Sans', Helvetica, Arial, sans-serif; font-size:14px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none; text-align:center; padding:0; margin:0">
                                                                    Ou usando este Link: <a
                                                                        href="{{ route('confirmProccess', ['token' => $temporary->token]) }}"
                                                                        target="_blank"
                                                                        style="color:#3F4CA4">{{ route('confirmProccess', ['token' => $temporary->token]) }}</a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                                    class="tableButton" style="">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" valign="top"
                                                                style="padding-top:20px;padding-bottom:20px;">

                                                                <!-- Button Table // -->
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align="center" class="ctaButton"
                                                                                style="background-color: #4191da; padding: 12px 35px; border-radius: 20;">
                                                                                <!-- Button Link // -->
                                                                                <a class="text"
                                                                                    href="{{ route('confirmProccess', ['token' => $temporary->token]) }}"
                                                                                    target="_blank"
                                                                                    style="color:#FFFFFF; font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:13px; font-weight:600; font-style:normal;letter-spacing:1px; line-height:20px; text-transform:uppercase; text-decoration:none; display:block">
                                                                                    Confirmar
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="20" style="font-size:1px;line-height:1px;">&nbsp;</td>
                                        </tr>

                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- Table Card Close// -->

                                <!-- Space -->

                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>
</table>
