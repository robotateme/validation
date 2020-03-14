<?php
/**
 * Created by PhpStorm.
 * User: inle
 * Date: 13.03.20
 * Time: 0:41
 */

namespace Examples\Forms;

use Robotateme\Validation\Form;

class SignUpForm extends Form
{
    public $strictProperties = true;

    public $user;
    public $email;
    public $password;
    public $passwordConfirm;


}