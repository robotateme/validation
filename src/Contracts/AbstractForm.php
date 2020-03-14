<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:43
 */

namespace Robotateme\Validation\Contracts;

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
     * @return mixed
     */
    abstract public function validate();

    /**
     * @param $data
     *
     */
    public function setData($data)
    {
        foreach ($data as $attribute => $value) {
            $this->{$attribute} = $value;
        }
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


}