<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class GroupValidator.
 *
 * @package namespace App\Validators;
 */
class GroupValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|unique:groups',
            'user_id' => 'required|exists:users,id',
            'instituition_id' => 'required|exists:instituitions,id',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
