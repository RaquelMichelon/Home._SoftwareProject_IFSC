<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home. | Login</title>

    <!-- atualizar  favicon -->
    <link rel="shortcut icon" href="./images/favicon.png" type="images/png">

    <link rel="stylesheet" type="text/css" href="./log-in-page/style.css">
</head>

<body>
    <section>
        <div class="imgBx">
            <!-- <img src="./Images/logo-home.svg" alt="ilustração de login" class="img-logo"> -->
            <!-- <img src="./images/home-logo-fundo-branco.svg" alt="ilustração de login"> -->
            <img src="./log-in-page/images/img-web@2x.png" alt="ilustração de login" class="img-login">
            <!-- <a href="https://storyset.com/online">Online illustrations by Storyset</a> -->
        </div>
        <div class="contentBx">
            
            <div class="formBx">
                <div class="logo">
                    <img src="./Images/logo-home.svg" alt="logo imagem" class="img-logo">
                </div>
                <h2>Login</h2>
                <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                <!-- verificar inform de form -->
                <form action="login.php" method="POST">
                    <div class="inputBx">
                        <span>E-mail</span>
                        <input name="usuario" type="email" required autofocus placeholder="Digite seu e-mail" />
                    </div>
                    <div class="inputBx">
                        <span>Senha</span>
                        <input name="senha" type="password" required placeholder="Digite sua senha" />
                        <p class="pass"><a href="#">Esqueci a senha</a></p>

                    </div>
                    <div class="remember">
                        <label class="checkbox">Lembrar-me
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="inputBx">
                        <button type="submit" value="sigin" name="sigin">Entrar</button>
                        <!-- <input type="submit" value="Sign-in"> -->
                    </div>
                    <div class="inputBx">
                        <p>Não possui uma conta? <a href="./signUp/sign-up.php">Registre-se</a></p>
                    </div>
                </form>
                <h3>Login com Google</h3>
                <ul class="google">
                    <li><img src="./log-in-page/images/google-icon.png" alt="ícone do google"></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>