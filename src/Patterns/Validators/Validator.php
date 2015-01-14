<?php

namespace Patterns\Validators;

use Patterns\Request;

class Validator {
    private $request;
    
    public function __construct(Request $request) {
        $this->request = $request;
    }
}
