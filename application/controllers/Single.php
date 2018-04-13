<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function post($id) { //inicio chamada de pagina single
        $single = $this->M_single->post_single($id);
        if ($single->num_rows() == '0') {
            $dados['dados_single'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_single'] = 1; //ativa a chamada no home
            $dados['single'] = $single;
            $dados['id'] = $id;
        }//fim chamada de destaque  

        
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'nav/single', $dados);
    }

}
