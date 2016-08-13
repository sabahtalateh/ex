<?php

namespace App\Components\Validator;

class Validator
{
    protected $possibleRules = [
        'required',
        'email'
    ];

    protected $rules = [];

    protected $errorMessages = [];

    public function create()
    {
    }

    public function validate($request)
    {
        foreach ($this->rules as $field => $rule) {
            foreach ($rule as $validationMethod => $error) {
                $exploded = explode(':', $validationMethod);
                if (count($exploded) > 1) {
                    $validationMethod = $exploded[0];
                    $validateParam = $exploded[1];
                    if (in_array($validationMethod, ['min', 'max'])) {
                        if (!$this->$validationMethod($request[$field], $validateParam)) {
                            $this->errorMessages[$field][] = $error;
                        }
                    }
                    if (in_array($validationMethod, ['equals'])) {
                        if (!$this->$validationMethod($request[$field], $request[$validateParam])) {
                            $this->errorMessages[$field][] = $error;
                        }
                    }
                } else {
                    if (!$this->$validationMethod($request[$field])) {
                        $this->errorMessages[$field][] = $error;
                    }
                }
            }
        }

        if (empty($this->errorMessages)) {
            return true;
        } else {
            return false;
        }
    }

    public function required($field)
    {
        if (is_null($field) or empty($field)) return false;
        return true;
    }

    public function email($email)
    {
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function min($field, $n)
    {
        if (strlen($field) < $n) return false;
        return true;
    }

    public function max($field, $n)
    {
        if (strlen($field) > $n) return false;
        return true;
    }

    public function equals($field1, $field2)
    {
        if ($field1 != $field2) return false;
        return true;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @return array
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

}