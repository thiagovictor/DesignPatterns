<?php

namespace Patterns\Interfaces;

interface ValidadorInterface {
    public function isValid($data);
    public function getFor();
    public function getMessageError();
}
