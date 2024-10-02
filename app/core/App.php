<?php 


class App {

    protected $Controller = 'Jurusan';
    protected $Method = 'index';
    protected $Params = [];
    public function __construct() 
    {

        //controller
        $url = $this->parseUrl();

    if (isset($url[0])) {
        if (file_exists('../app/controllers/' . $url[0] . '.php')) 
        {
            $this->Controller = $url[0];
            unset($url[0]);
        }

    }
    

        require_once '../app/controllers/' . $this->Controller . '.php';
        $this->Controller = new $this->Controller;

        //method

        if ( isset($url[1])) {
            if (method_exists($this->Controller, $url[1])) {
                $this->Method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
           $this->Params = array_values($url);
        }

        //jalankan controller dan method,  serta kirimkan params jika ada
        call_user_func_array([$this->Controller, $this->Method], $this->Params);
    }

    public function parseUrl ()
    {
        if ( isset($_GET['url']) ) {
                
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
        
            return $url;

        }
    }
}