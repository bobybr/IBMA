<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quemsomos extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        //$this->load->view('welcome_message');
        $this->template->set('title', 'HS Sistemas - a melhor opção!');
        $this->template->load('template', 'home');
        
    }

    //SELECIONA A CATEGORIA E SETA O LIMITE
    public function categoria_limite($recuperar) {

        if ($recuperar == 'destaque') {
            $limite = '3';
            $quando = 'novidades';
        } else if ($recuperar == 'lista') {
            $limite = '3,5';
            $quando = 'novidades';
        } else if ($recuperar == 'cursos') {
            $limite = '3';
            $quando = 'cursos';
        } else if ($recuperar == 'produtos') {
            $limite = '16';
            $quando = 'produtos';
        }
    }

}
