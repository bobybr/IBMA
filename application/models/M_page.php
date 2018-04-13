<?php

class M_page extends CI_Model {

    function pagina($pagina) {


//RECUPERA POST UNICO

        $this->db->select('id,pagina,content');
        $this->db->from('up_page');
        $this->db->where('pagina',$pagina);
        $post = $this->db->get();


        return ($post);
    }
    
    

}
