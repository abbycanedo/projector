<?php

namespace TheProjector\ProjectUser;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ProjectUser extends Eloquent{
	protected $table = 'project_user';
	public $timestamps = false;
	protected $fillable = [
		'project_id',
		'user_id',
	];
}