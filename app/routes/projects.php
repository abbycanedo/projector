<?php

$app->get('/projects/create', $authenticated(), function() use ($app){
	$app->render('projects.php');
})->name('projects');



$app->post('/projects/create', $authenticated(), function() use ($app){
	$request = $app->request;

	$code = $request->post('code');
	$name = $request->post('name');
	$budget = $request->post('budget');
	$remark = $request->post('remark');

	$v = $app->projectvalidation;

	$v->validate([
		'code' => [$code, 'required|uniqueCode'],
		'name' => [$name, 'required'],
		'budget' => [$budget, 'required']
	]);

	if ($v->passes()){
		$app->project->create([
			'code' => $code,
			'name' => $name,
			'budget' => $budget,
			'remark' => $remark
		]);

		$app->flash('global', 'Project successfully created!');
		$app->redirect($app->urlFor('projects'));
	} else{

		$app->flash('global', 'Error! Make sure all input is correct and Project Code is not in use!');
		$app->redirect($app->urlFor('projects'));
	}

	$app->render('auth/projects.php', [
		'errors' => $v->errors(),
		'request' => $request,
	]);

})->name('projects.post');