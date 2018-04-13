<?php

class M_single extends CI_Model {

    function post_single($id) {


//RECUPERA POST UNICO

        $this->db->select('thumb,titulo,texto,categoria,`data`,autor,valor_real,valor_pagseguro,visitas');
        $this->db->from('up_posts');
        $this->db->where('id', $id);
        $post = $this->db->get();


        foreach ($post->result() as $row) {
            //faz select do nome do usuario
            $this->db->select('nome');
            $this->db->from('up_users');
            $this->db->where('id', $row->autor);
            $pega_autor = $this->db->get();
            //seleciona usuario e adiciona na variavel noticias do retotno
            $row1 = $pega_autor->row();
            $row->autor = $row1->nome;
            
           
            $visitas = array(
               'visitas' => $row->visitas + 1,
                'data' =>$row->data
            );
            
            $this->db->where('id', $id);
            $this->db->update('up_posts', $visitas);
        }

        
        return ($post);
    }
    
    

}
