<?php

$app->get('/signin', $guest(), function() use ($app){
	$app->render('/auth/login.php');
})->name('login');

$app->post('/signin', $guest(), function() use ($app){
	$request = $app->request;

	$username = $request->post('username');
	$password = $request->post('password');

	$v = $app->validation;

	$v->validate([
		'username' => [$username, 'required|min(5)|max(200)'],
		'password' => [$password, 'required|min(7)|max(11)'],
	]);

	if ($v->passes()){
		$user = $app->user->where('username', $username)->first();

		if($user && $app->hash->passwordCheck($password, $user->password)){
			$_SESSION[$app->config->get('auth.session')] = $user->id;
			$app->flash('global', 'You are now logged in!');
			$app->redirect($app->urlFor('dashboard'));
		}
		$app->flash('global', 'Error logging in! Make sure all input is correct or user exists.');
		$app->redirect($app->urlFor('login'));
	}

})->name('login.post');
