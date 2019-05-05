<?php

namespace Whylab\Todolist\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use Validator;

class ValidatorHelper
{
    /** @var Request $request */
    private $request;

    /** @var array */
    private $messages;

    /** @var array */
    private $rules;

    /**
     * Validator constructor.
     * @param Request $request
     * @param array $messages
     * @param array $rules
     */
    public function __construct(Request $request, $rules, $messages)
    {
        $this->request = $request;
        $this->rules = $rules;
        $this->messages = $messages;
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate()
    {
        return Validator::make($this->request->all(), $this->rules, $this->messages);
    }
}