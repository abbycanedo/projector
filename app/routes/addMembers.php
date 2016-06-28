<?php

$app->get('/projects/assignments/:projectId', $authenticated(), function($projectId) use ($app){
	$users = \TheProjector\User\User::all();
    $project = \TheProjector\Project\Project::where('id', $projectId)->first();
	$membersId = \TheProjector\ProjectUser\ProjectUser::where('project_id', $projectId)->get();
	$members = [];
	foreach ($membersId as $mi) {
		$temp = $mi->user_id;
		$members[] = \TheProjector\User\User::where('id', $temp)->first();
	}
	$available = [];
	foreach ($users as $user) {
		if (!in_array($user, $members)) {
			$available[] = $user;
		}
	}

    if (!$project) {
    	$app->notFound();
    }

    $app->render('addMembers.php', array(
    	'available' => $available,
    	'project' => $project,
    	'members' => $members
    ));
    
})->name('addMembers');

$app->post('/projects/assignments/:projectId', $authenticated(), function($projectId) use ($app){
	$action = $_POST['action'];
	if ($action=='add') {
		$new_member = $_POST['new_member'];
		$id = $_POST['project_id'];

		$app->project_user->create([
			'project_id' => $id, 
			'user_id' => $new_member
		]);
		
	} elseif ($action=='delete') {
		$member = $_POST['member_id'];
		$id = $_POST['project_id'];
		$app->project_user->where('project_id', $id)->where('user_id', $member)->delete();
//		$app->flash('global', 'User successfully deleted!');
	}

})->name('addMembers.post');