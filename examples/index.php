<?php
require_once '../vendor/autoload.php';

use Examples\Forms\SignUpForm;
use Examples\Validators\EmailValidator;
use Robotateme\Validation\Validators\MaxLengthValidator;
use Robotateme\Validation\Validators\MinLengthValidator;
use Robotateme\Validation\Validators\RequiredValidator;
use Robotateme\Validation\Validators\StringValidator;

$data = [
    'username' => 'robotateme',
    'email' => 'jarwork884@gmail.com',
    'password' => 'p@55word',
    'password_confirm' => 'p@55word',
];


$form = new SignUpForm($data);

$form->addRule('username',
    [
        new RequiredValidator(),
        new StringValidator(),
        new MinLengthValidator(6),
        new MaxLengthValidator(32)
    ]
);

$form->addRule('email',
    [
        new RequiredValidator(),
        new StringValidator(),
        new EmailValidator(),
        new MinLengthValidator(6),
        new MaxLengthValidator(32)
    ]
);

$form->validate();
//var_dump($form->errors);
//var_dump($form->failed);
//var_dump($form->validated);
//var_dump($form->successfully);
var_dump((new EmailValidator())->validate('email', 'jarwork884@gmail.com'));
die('fine '.PHP_EOL);