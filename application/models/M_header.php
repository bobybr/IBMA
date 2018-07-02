<?php

class M_header extends CI_Model 
{
	
	function verificar_manutencao ()
	{
		$this->db->from('up_manu');	
		$this->db->where('status','ativo');
		$query = $this->db->get();
		
		return ($query->num_rows());
	}
        
        function pegar_staticas()
        {
            $this->db->select('pagina');
            $this->db->from('up_page');
            
            return  $this->db->get();
        }
        
        function pegar_randomicas()
        {
            $this->db->select('categoria');
            $this->db->from('up_menu');
            
            return  $this->db->get();
        }
        
}