<?php

namespace Http\Forms;

use Core\Validator;
use Core\Exceptions\ValidationException;

class RegistrationForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes['name'], 3, 100)) {
            $this->errors['name'] = 'Name must have at least 3 characters and no more than 100.';
        }

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!Validator::string($attributes['password'], 6, 100)) {
            $this->errors['password'] = 'Passwords must have at least 6 characters and no more than 100.';
        }

        if (!Validator::password($attributes['password'], $attributes['repeat_password'])) {
            $this->errors['repeat_password'] = 'Provided password does not match.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);


        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }
    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
