<?php

namespace controller;

include "controller/controller.php";
include "traits/response_formatter.php";

use traits\response_formatter;

class product_controller extends controller {
    use response_formatter;

    public function __construct() {
        $this->controller_name = "Get All Product";
        $this->controller_method = "GET";
    }

    public function getProducts(){
        $data = [
            "Aqua",
            "Jus Alpukat",
            "Tahu Krezs",
            "Martabak"
        ];

        $response = [
            "controller_attr"=>$this->getControllerAttr(),
            "product"=>$data
        ];

        return $this->responseFormatter(200, "Success", $response);
    }
}

?>