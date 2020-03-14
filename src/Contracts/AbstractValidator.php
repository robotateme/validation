<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:47
 */

namespace Robotateme\Validation\Contracts;

abstract class AbstractValidator
{
    public $params = [];
    public $message = 'Value of attribute is wrong!';
    public $attributeName = null;

    /**
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    abstract public function validate($attribute, $value);

    /**
     * AbstractValidator constructor.
     *
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->message       = $params['message'] ?? $this->message;
        $this->attributeName = $params['attributeName'] ?? null;
    }

}