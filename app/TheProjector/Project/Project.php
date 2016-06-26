<?php

namespace TheProjector\Project;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Project extends Eloquent{
	protected $table = 'projects';
	public $timestamps = false;

	protected $fillable = [
		'code',
		'name',
		'budget',
		'remark'
	];
}