<?php

namespace controller;

class controller {
    // attr
    var $controller_name;
    var $controller_method;

    // attribut takes
    public function getControllerAttr() {
        return [
            "Name" => $this->controller_name,
            "Method" => $this->controller_method
        ];
    }
}

?>