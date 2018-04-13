<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function view($pagina) { //inicio chamada de pagina page
        $page = $this->M_page->pagina($pagina);
        if ($page->num_rows() == '0') {
            $dados['dados_page'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_page'] = 1; //ativa a chamada no home
            $dados['page'] = $page;
        }//fim chamada de destaque  

        
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'nav/page', $dados);
    }

}
