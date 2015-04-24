<?php

namespace Controllers;

class Master_Controller {

    protected $layout;

    protected $views_dir;

    public function __construct( $views_dir = '/views/master' ) {

        $this->views_dir = $views_dir;

        $this->layout = DX_ROOT_DIR . '/views/layouts/default.php';
    }
}