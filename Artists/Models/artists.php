<?php

namespace Models;

class Artists_Models extends Master_Model {

    public function __construct() {
        parent::__construct( array( 'table' => 'artists') );
    }
}