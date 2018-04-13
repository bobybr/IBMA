<?php

class M_home extends CI_Model {

    function categoria_limite($quando,$limite1,$limite2) {


//RECUPERA AS NOTÍCCIAS

        $this->db->select('id,thumb,titulo,texto,categoria,`data`,autor,valor_real,valor_pagseguro');
        $this->db->from('up_posts');
        $this->db->where('categoria', $quando);
        $this->db->order_by('data','desc');
        $this->db->limit($limite1,$limite2);
        $noticias = $this->db->get();


        foreach ($noticias->result() as $row) {
            //faz select do nome do usuario
            $this->db->select('nome');
            $this->db->from('up_users');
            $this->db->where('id', $row->autor);
            $pega_autor = $this->db->get();
            //seleciona usuario e adiciona na variavel noticias do retotno
            $row1 = $pega_autor->row();
            $row->autor = $row1->nome;
        }


        return ($noticias);
    }

}
