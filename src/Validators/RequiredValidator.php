<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 1:44
 */
namespace Robotateme\Validation\Validators;

use Robotateme\Validation\Contracts\AbstractValidator;

class RequiredValidator extends AbstractValidator
{
    protected $allowEmpty;

    public function __construct($allowEmpty = false, array $params = [])
    {
        $this->allowEmpty = $allowEmpty;
        parent::__construct($params);
    }

    public function validate($attribute, $value)
    {
        if ($this->allowEmpty === true) {
            return !is_null($value);
        }

        return !empty($value);
    }
}