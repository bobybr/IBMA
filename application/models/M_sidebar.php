<?php

class M_sidebar extends CI_Model {

    function sidebar_produto($topico) {


//RECUPERA POST UNICO

        $this->db->select('id,titulo,categoria');
        $this->db->from('up_posts');
        $this->db->where('id', $topico);
        $post = $this->db->get();


        return ($post);
        
        
    }
function sidebar_categoria() {


//RECUPERA POST UNICO

        $this->db->select('id,titulo,categoria');
        $this->db->from('up_posts');
        $this->db->group_by('categoria');
        $post = $this->db->get();


        return ($post);
        
        
    }
    
    function sidebar_vistos() {


//RECUPERA POST UNICO

        $this->db->select('id,titulo,categoria');
        $this->db->from('up_posts');
        $this->db->order_by('visitas','DESC');
        $this->db->limit(5);
        $post = $this->db->get();


        return ($post);
        
        
    }
    
    }
    
    


