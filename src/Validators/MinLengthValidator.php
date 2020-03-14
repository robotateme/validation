<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 1:44
 */

namespace Robotateme\Validation\Validators;


class MinLengthValidator extends MaxLengthValidator
{
    public $message = "{attributeName} should be not shorter than {length}";

    public function validate($attribute, $value)
    {
        $this->drawMessage($attribute);
        return strlen($value) > $this->length;
    }
}
