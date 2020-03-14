<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 1:44
 */

namespace Robotateme\Validation\Validators;

use Robotateme\Validation\Contracts\AbstractValidator;

class MaxLengthValidator extends AbstractValidator
{

    public $length;
    public $message = "{attributeName} should be not longer than {length}";

    /**
     * MaxLengthValidator constructor.
     *
     * @param int   $length
     * @param array $params
     */

    public function __construct(int $length, array $params = [])
    {
        parent::__construct($params);
        $this->length = (int)$length;
    }

    public function validate($attribute, $value)
    {
        return strlen($value) < $this->length;
    }

    public function drawMessage($attribute)
    {
        $this->attributeName = $this->attributeName ?? $attribute;
        $this->message = str_replace(['{attributeName}', '{length}'], ["{$this->attributeName}", $this->length], $this->message);
    }
}
