<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;
    public $url_active = array();
    public $num = 0;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        session_start();
        ob_start();
        
        $this->openDatabaseConnection();
        $this->loadModel();
        $this->loadActive();
        $this->loadPage();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadActive(){
      $url =  "{$_SERVER['REQUEST_URI']}";
      $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
      $this->url_active = explode("/",$url);
    }
    public function loadModel()
    {
        /*$_SESSION['user'] = [];*/
        require APP . 'model/model.php';
        // create new "model" (and pass the database connection)
        $this->model = new Model($this->db);
    }
    public function loadPage(){
        if(!isset($this->url_active[2]) || strtolower($this->url_active[2]) != 'admin'){
            $this->num = $this->model->loadNumCart();
            if(isset($_POST['search'])){
                if(isset($_POST['key-search'])){
                    if(isset($_SESSION['shop'])){
                        unset($_SESSION['shop']);
                    }
                    $_SESSION['shop'] = $this->model->searchItems($_POST['key-search']);
                    header("location: ".URL."shop");
                }
            }
        }
    }
}
