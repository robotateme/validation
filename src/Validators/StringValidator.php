<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 1:44
 */
namespace Robotateme\Validation\Validators;

use Robotateme\Validation\Contracts\AbstractValidator;

class StringValidator extends AbstractValidator
{
    public $message = "{attributeName} should a string!";

    public function validate($attribute, $value)
    {
        return is_string($value);
    }
}