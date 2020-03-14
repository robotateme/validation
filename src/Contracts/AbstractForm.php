<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:43
 */

namespace Robotateme\Validation\Contracts;

use Robotateme\Validation\Exceptions\ValidationException;

abstract class AbstractForm
{
    /**
     * @var array $fieldSet
     * Contains validation scheme
     */
    protected $fieldSet = [];
    protected $data = [];

    /**
     * @var array $validated
     * Contains validated (clear) attributes and values
     */

    public $validated = [];
    public $successfully = [];

    public $failed = [];
    /**
     * @var array $errors
     * Contains error messages and attribute names
     */
    public $errors = [];

    /**
     * @var bool $strictProperties
     * Override if strict compliance with class properties is needed
     */
    protected $strictProperties = false;


    /**
     * @param $data
     *
     * @throws ValidationException
     */
    public function setData($data)
    {
        foreach ($data as $attribute => $value) {
            $this->{$attribute} = $value;
        }
    }

    /**
     * Form constructor.
     *
     * @param array $fieldSet
     *
     */
    public function __construct(array $fieldSet = [])
    {
        $this->setFieldSet($fieldSet);
    }

    /**
     * @param array $fieldSet
     */
    public function setFieldSet(array $fieldSet): void
    {
        $this->fieldSet = $fieldSet;
    }

    /**
     * @param bool $strictProperties
     */
    public function setStrictProperties(bool $strictProperties): void
    {
        $this->strictProperties = $strictProperties;
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

    /**
     * @param $name
     * @param $value
     *
     * @throws ValidationException
     */
    public function __set($name, $value)
    {
        if (!property_exists(static::class, $name) && $this->strictProperties == true) {
            throw new ValidationException("Unknown form attribute {$name}");
        }
        $this->{$name} = $value;
    }

}