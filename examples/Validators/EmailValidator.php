<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:41
 */

namespace Examples\Validators;

use Robotateme\Validation\Contracts\AbstractValidator;

class EmailValidator extends AbstractValidator
{
    protected $pattern = '/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/';
    public $message = 'Attribute {attributeName} should be a correct E-mail address';
    /**
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    public function validate($attribute, $value)
    {
        $this->drawMessage($attribute);
        return (bool) preg_match($this->pattern, $value);
    }

    public function drawMessage($attribute)
    {
        $this->attributeName = $this->attributeName ?? $attribute;
        $this->message = str_replace('{attributeName}', $this->attributeName, $this->message);
    }
}