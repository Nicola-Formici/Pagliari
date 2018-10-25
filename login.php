<?php
include_once './lib/lib.php';

function main() {
    list( $success, $msg ) = LoginController::process();
    $html_msg = '';
    if ( $success ) {
        LoginController::redirect_success();
    } elseif( !empty($msg)  ) {
        $html_msg = sprintf('<br /><div class="alert alert-warning" role="alert">%s</div>', $msg);
    }
    $action = $_SERVER['PHP_SELF'];
    // wrapping con contentuto rimanente
    $content = <<<__end__
    $html_msg
    <form class="form_accedi" action="$action" method="POST">
        <div class="text-center">
            Logo
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <label for="inputEmail" class="sr-only">Email </label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email " required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <a href="registration.php"> Non ti sei ancora registrato? </a>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
    </form>
__end__;
    return layout($content, $title = "", "Vendita mezzi agricoli e lavorazioni di carpenteria meccanica.");
}

echo main();
