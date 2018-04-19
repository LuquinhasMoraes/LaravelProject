<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserGroupValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => 
        [
            'user_id' => 'unique'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
