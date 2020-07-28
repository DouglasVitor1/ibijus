<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais_model extends CI_Model {
    
    public function get_locais(){
        $this->db->from('locais');
        $this->db->order_by('id', 'DESC');
		return  $this->db->get();
    }
	public function get_byid($id = null){
        if($id != null){
            $this->db->from('locais');
            $this->db->where('id', $id);
            $this->db->limit(1);
            return  $this->db->get();
        }else{
            return FALSE;
        }
    }
	public  function do_insert($dados=null, $redir=null){
        if($dados != null){
            $this->db->insert('locais',$dados);
            set_msg('msgok', 'Local cadastrado com sucesso.', 'sucesso');
            if($redir){
                redirect('locais/gerenciar');
            }
        }
    }
	public function updateLocal($dados=null, $condicao=null, $redir=null){
        if($dados != null){
            $this->db->update('locais',$dados,$condicao);
            set_msg('msgok', 'Local atualizado com sucesso', 'sucesso');
            if($redir){
                  redirect("locais/gerenciar");
            }
        }
    }
}
/* End of file Locais_model.php */
/* Location: ./application/model/Locais_model.php */