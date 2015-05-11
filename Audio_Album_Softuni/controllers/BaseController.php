<?php

abstract class BaseController {

    protected $actionName;
    protected $controllerName;
    protected $layoutName = DEFAULT_LAYOUT;
    protected $isPost = false;
    protected $isViewRendered = false;
    protected $isLoggedIn;

    function __construct( $controllerName, $action ) {
        $this->actionName = $action;
        $this->controllerName = $controllerName;

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $this->isPost = true;
        }

        if( isset( $_SESSION['username'] ) ) {
            $this->isLoggedIn = true;
        }

        $this->OnInit();
    }

    public function OnInit() {
        // Implement initialize logic in the subclasses
    }

    public function index() {
        // implement the default action in the subclasses
    }

    public function renderView( $viewName = null, $includeLayout = true ) {

        if(!$this->isViewRendered) {
            if( $viewName == null ) {
                $viewName = $this->actionName;
            }

            if( $includeLayout ) {
                include_once 'views/layouts/' . $this->layoutName . '/' . 'header.php';
            }

            include_once ('views/' . $this->controllerName . '/' . $viewName . '.php');

            if( $includeLayout ) {
                include_once 'views/layouts/' . $this->layoutName . '/' . 'footer.php';
            }

            $this->isViewRendered = true;
        }
    }

    public function redirectToUrl( $url ) {
        header("Location: " . $url);
        die();
    }

    public function redirect( $controllerName, $actionName = null, $params = null ) {
        $url = '/Audio_Album_Softuni/' . urlencode( $controllerName );

        if( $actionName != null ) {
            $url .= '/' . urlencode( $actionName );
        }

        if( $params != null ) {
            $encodeParams = array_map( $params, 'urlencode' );
            $url .= implode( '/', $encodeParams );
        }

        $this->redirectToUrl($url);
    }

    public function authorize() {
        if( !$this->isLoggedIn ) {
            $this->addErrorMessage("Please login first");
            $this->redirectToUrl("/Audio_Album_Softuni/account/login");
        }
    }

    public function addMessage( $msg, $type ) {
        if( !isset($_SESSION['messages']) ) {
            $_SESSION['messages'] = array();
        }

        array_push( $_SESSION['messages'],
            array( 'text' => $msg, 'type' => $type ) );
    }

    public function addInfoMessage( $msg ) {
        $this->addMessage( $msg, 'info' );
    }

    public function addErrorMessage( $msg ) {
        $this->addMessage( $msg, 'error' );
    }
}














