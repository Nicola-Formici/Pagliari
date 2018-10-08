<?php
include_once './lib/lib.php';

function main(){
	// wrapping con contentuto rimanente
	$content = <<<__end__
	<form class="form_accedi">
			<div class="text-center">
				<img class="mb-4" src=".\immagini\pagliari.png" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				<label for="inputEmail" class="sr-only">Email </label>
				<input type="email" id="inputEmail" class="form-control" placeholder="Email " required autofocus>
				<br>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<div class="checkbox mb-3">
					<a href="registration.php"> Non ti sei ancora registrato? </a>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		    </div>
		</form>
__end__;
	return layout($content);
}
		
echo main();
?>