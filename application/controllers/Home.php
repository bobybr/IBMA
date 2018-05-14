<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() { //inicio chamada de novidades destaque
        
        $page = $this->M_header->pegar_config();
        if ($page->num_rows() == '0') {
            $dados['dados_header'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_header'] = 1; //ativa a chamada no home
            $dados['page'] = $page;
        }//fim chamada de destaque 
       
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'nav/contato',$dados);
    }

}
