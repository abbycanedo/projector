<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

use TheProjector\User\User;
use TheProjector\Project\Project;
use TheProjector\ProjectUser\ProjectUser;
use TheProjector\Helpers\Hash;
use TheProjector\Validation\Validator;
use TheProjector\ProjectValidation\ProjectValidator;
use TheProjector\Middleware\BeforeMiddleware;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
	'mode' => file_get_contents(INC_ROOT . '/mode.php'),
	'view' => new Twig(),
	'templates.path' => INC_ROOT . '/app/views'
]);

$app->add(new BeforeMiddleware);

$app->configureMode($app->config('mode'), function() use ($app){
	$app->config = Config::load(INC_ROOT . "/app/config/{$app->mode}.php");
});

require 'database.php';
require 'filters.php';
require 'routes.php';

$app->auth = false;

$app->container->set('user', function(){
	return new User();
});

$app->container->set('project', function(){
	return new Project();
});

$app->container->set('project_user', function(){
	return new ProjectUser();
});

$app->container->singleton('hash', function() use ($app){
	return new Hash($app->config);
});

$app->container->singleton('validation', function() use ($app){
	return new Validator($app->user);
});

$app->container->singleton('projectvalidation', function() use ($app){
	return new ProjectValidator($app->project);
});

$view = $app->view();

$view->parserOptions = [
	'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions = [
	new TwigExtension
];