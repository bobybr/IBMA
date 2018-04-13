<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() { //inicio chamada de novidades destaque
        $novi1 = $this->M_home->categoria_limite('novidades',3,0);
        if ($novi1->num_rows() == '0') {
            $dados['dados_novidade1'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_novidade1'] = 1; //ativa a chamada no home
            $dados['novidades1'] = $novi1;
        }//fim chamada de destaque  //inicio chamada de novidades lista
        $novi2 = $this->M_home->categoria_limite('novidades',4,3);
        if ($novi2->num_rows() == '0') {
            $dados['dados_novidade2'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_novidade2'] = 1; //ativa a chamada no home
            $dados['novidades2'] = $novi2;
        }
        //fim chamada de lista  //inicio chamada de blog 1
        $blo1 = $this->M_home->categoria_limite('blog',3,0);
        if ($blo1->num_rows() == '0') {
            $dados['dados_blog1'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_blog1'] = 1; //ativa chamada no home
            $dados['blog1'] = $blo1;
        }//fim chamada de blog 1  //inicio chamada de blog 2
        $blo2 = $this->M_home->categoria_limite('blog',3,3);
        if ($blo2->num_rows() == '0') {
            $dados['dados_blog2'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_blog2'] = 1; //ativa chamada no home
            $dados['blog2'] = $blo2;
        }//fim chamada de blog 2  //inicio chamada de produto
        $pro = $this->M_home->categoria_limite('produtos',4,0);
        if ($pro->num_rows() == '0') {
            $dados['dados_produto'] = 'Estamos alimentando o site, favor volte mais tarde!';
        } else {
            $dados['dados_produto'] = 1; //ativa chamada no home
            $dados['produto'] = $pro;
        }   //fim chamada de produto
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'nav/contato', $dados);
    }

}
