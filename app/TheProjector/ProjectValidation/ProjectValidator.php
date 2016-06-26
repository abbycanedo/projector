<?php

namespace TheProjector\ProjectValidation;

use Violin\Violin;
use TheProjector\Project\Project;

class ProjectValidator extends Violin{
	protected $project;

	public function __construct(Project $project){
		$this->project = $project;
	}

	public function validate_uniqueCode($value, $input, $args){
		return ! (bool) $this->project->where('code', $value)->count();
	}
}