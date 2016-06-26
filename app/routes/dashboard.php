<?php

$app->get('/projects', $authenticated(), function() use ($app){
    $projects = \TheProjector\Project\Project::all();
    $app->render('dashboard.php', array(
    	'projects' => $projects,
    	'auth' => $app->auth
    ));

})->name('dashboard');
