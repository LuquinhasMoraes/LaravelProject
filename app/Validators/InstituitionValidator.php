<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class InstituitionValidator.
 *
 * @package namespace App\Validators;
 */
class InstituitionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            // 'name' => 'required|unique:instituitions',
            // 'instituition_id' => 'required',
            // 'user_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
