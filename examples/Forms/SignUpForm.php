<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:41
 */

namespace Examples\Forms;

use Robotateme\Validation\Contracts\AbstractForm;
use Robotateme\Validation\Form;

class SignUpForm extends AbstractForm
{
    public $strictProperties = true;

    public $user;
    public $email;
    public $password;
    public $passwordConfirm;


    /**
     * @return mixed
     */
    public function validate()
    {
        // TODO: Implement validate() method.
    }
}