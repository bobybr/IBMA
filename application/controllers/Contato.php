<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() { //inicio chamada de novidades destaque
    
            $dados['teste'] = 'teste';
        
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'nav/contato', $dados);
    }

}
