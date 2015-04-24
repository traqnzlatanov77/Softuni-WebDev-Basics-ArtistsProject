<?php

namespace Controllers;

class Artists_Controller extends Master_Controller {

    public function __construct() {
        parent::__construct( 'views/artists/');
    }

    public function index() {
        $template_name = DX_ROOT_DIR . $this->views_dir .'index.php';

        include_once $this->layout;
    }

    public function dve() {
        $template_name = DX_ROOT_DIR . $this->views_dir .'dve.php';

        include_once $this->layout;
    }

    public function tri() {
        $template_name = DX_ROOT_DIR . $this->views_dir . 'tri.php';

        include_once $this->layout;
    }
}