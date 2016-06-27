<?php

$app->get('/persons/create', $authenticated(), function() use ($app){
	$app->render('auth/register.php');
})->name('register');

$app->post('/persons/create', $authenticated(), function() use ($app){
	
	$request = $app->request;

	$firstname = $request->post('first_name');
	$lastname = $request->post('last_name');
	$username = $request->post('username');
	$password = $request->post('password');
	$passwordConfirm = $request->post('password_confirm');

	$v = $app->validation;

	$v->validate([
		'firstname' => [$username, 'required|min(2)|max(50)'],
		'lastname' => [$lastname, 'required|min(2)|max(50)'],
		'username' => [$username, 'required|email|min(5)|max(200)|uniqueEmail'],
		'password' => [$password, 'required|min(7)|max(11)'],
		'password_confirm' => [$passwordConfirm, 'required|matches(password)']
	]);

	if ($v->passes()){
		$app->user->create([
			'firstname' => $firstname,
			'lastname' => $lastname,
			'username' => $username,
			'password' => $app->hash->password($password)
		]);

		$app->flash('global', 'User successfully created.');
		$app->redirect($app->urlFor('register'));		
	} else{

		$app->flash('global', 'Error! Make sure all input is correct or the Email is not in use.');
		$app->redirect($app->urlFor('register'));
	}

	$app->render('auth/register.php', [
		'errors' => $v->errors(),
		'request' => $request,
	]);


})->name('register.post');