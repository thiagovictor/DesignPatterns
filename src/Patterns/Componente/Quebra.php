<?php

namespace Patterns\Componente;

use Patterns\Interfaces\ComponenteInterface;

class Quebra implements ComponenteInterface {

    public function render() {
        return "<br>";
    }

}
