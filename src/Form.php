<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:41
 */

namespace Robotateme\Validation;

use Robotateme\Validation\Contracts\AbstractForm;
use Robotateme\Validation\Contracts\AbstractValidator;
use Robotateme\Validation\Exceptions\ValidationException;

class Form extends AbstractForm
{
    /**
     * Form constructor.
     *
     * @param array $data
     * @param array $fieldSet
     */
    public function __construct(array $data = [], array $fieldSet = [])
    {
        $this->setFieldSet($fieldSet);
        $this->setData($data);
    }


    /**
     * @return bool
     */
    public function validate()
    {
        foreach ($this->fieldSet as $attribute => $validators) {
            /** @var AbstractValidator $validator */
            foreach ($validators as $validator) {
                if ($validator->validate($attribute, $this->{$attribute})) {
                    $this->successfully[$attribute] = $this->{$attribute};
                } else {
                    $this->errors[$attribute][] = $validator->message;
                    $this->failed[$attribute]   = $this->{$attribute};
                }

                $this->validated[$attribute] = $this->{$attribute};
            }
        }

        return (bool) count($this->failed);
    }


    /**
     * @param string $attribute
     * @param array  $validators
     *
     * @return $this
     * @throws ValidationException
     *
     */
    public function addRule(string $attribute, $validators = [])
    {

        if (true) {
            foreach ($validators as $Validator) {
                if ($Validator instanceof AbstractValidator) {
                    $this->fieldSet[$attribute][] = $Validator;
                    continue;
                } else {
                    throw new ValidationException("Validator should be instance of " . AbstractValidator::class);
                }
            }

            return $this;
        }
        throw new ValidationException("Unknown form attribute {$attribute}");
    }

}