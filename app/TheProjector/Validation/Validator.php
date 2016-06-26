<?php

namespace TheProjector\Validation;

use Violin\Violin;
use TheProjector\User\User;

class Validator extends Violin{
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function validate_uniqueEmail($value, $input, $args){
		$user = $this->user->where('username', $value);
		return ! (bool) $user->count();
	}
}