<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Locais extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
        $this->load->library('form_validation');
        init_painel();
    }
	public function gerenciar() {
        set_tema('titulo', 'Gerenciar Local');
        set_tema('conteudo', load_modulo('locais', 'gerenciar'));
        load_template();
	}
	
	public function visualizar() {

        set_tema('titulo', 'Visualizar Local');
        set_tema('conteudo', load_modulo('locais', 'visualizar'));
        set_tema('rodape', '');
        load_template();
	}
	
	public function cadastrar() {

		
		$this->form_validation->set_rules('nome', 'Nome do Local','trim|required');
		$this->form_validation->set_rules('cep', 'CEP do Local','trim|required');
		$this->form_validation->set_rules('logradouro', 'Logradouro  do Local','trim|required');
		$this->form_validation->set_rules('numero', 'Número do Local','trim|required');
		$this->form_validation->set_rules('complemento', 'Complemento do Local','trim|required');
		$this->form_validation->set_rules('bairro', 'Bairro do Local','trim|required');
		$this->form_validation->set_rules('uf', 'UF do Local','trim|required');
		$this->form_validation->set_rules('cidade', 'Cidade do Local','trim|required');
		$this->form_validation->set_rules('data', 'Data da Visita no Local','trim|required');

		if($this->form_validation->run()== TRUE){
			
			$cep = str_replace('-','',$this->input->post('cep'));
			$dados = elements(array('nome','cep','logradouro','numero','complemento','bairro','uf','cidade','data'), $this->input->post());
			$dados['cep'] =$cep;

			$this->db->insert('locais', $dados);
			set_msg('msgok', 'Local cadastrado com sucesso.', 'sucesso');
			redirect('locais/gerenciar');
		}
        set_tema('titulo', 'Cadastrar Local');
        set_tema('conteudo', load_modulo('locais', 'cadastrar'));
        set_tema('rodape', '');
        load_template();
	}
	
	public function editar() {

		$this->form_validation->set_rules('hdIdLocal', 'ID do Local','trim|required');
		$this->form_validation->set_rules('nome', 'Nome do Local','trim|required');
		$this->form_validation->set_rules('cep', 'CEP do Local','trim|required');
		$this->form_validation->set_rules('logradouro', 'Logradouro  do Local','trim|required');
		$this->form_validation->set_rules('numero', 'Número do Local','trim|required');
		$this->form_validation->set_rules('complemento', 'Complemento do Local','trim|required');
		$this->form_validation->set_rules('bairro', 'Bairro do Local','trim|required');
		$this->form_validation->set_rules('uf', 'UF do Local','trim|required');
		$this->form_validation->set_rules('cidade', 'Cidade do Local','trim|required');
		$this->form_validation->set_rules('data', 'Data da Visita no Local','trim|required');
		
		if($this->form_validation->run()== TRUE){

			$cep = str_replace('-','',$this->input->post('cep'));
			$dados = elements(array('nome','cep','logradouro','numero','complemento','bairro','uf','cidade','data'), $this->input->post());
			$dados['cep'] =$cep;

			$this->db->update('locais', $dados, array('id'=>$this->input->post('hdIdLocal')));
			set_msg('msgok', 'Local atualizado com sucesso.', 'sucesso');
			redirect('locais/gerenciar');
		}
        set_tema('titulo', 'Editar Local');
        set_tema('conteudo', load_modulo('locais', 'editar'));
        set_tema('rodape', '');
        load_template();
	}
	
	public function excluir() {

        $this->form_validation->set_message('required', 'O campo %s é obrigatório');
		$this->form_validation->set_rules('idPost', 'ID da Personalização','trim|required');
		if($this->form_validation->run()== TRUE){
			$idPost = $this->input->post('idPost');
            $this->db->delete('locais',array('id'=>$idPost));
			set_msg('msgok', 'Local excluído com sucesso', 'sucesso');
			redirect("locais/gerenciar");
		}
        set_tema('titulo', 'Excluir Local');
        set_tema('conteudo', load_modulo('locais', 'excluir'));
        set_tema('rodape', '');
        load_template();
	}
}
/* End of file Locais.php */
/* Location: ./application/controllers/Locais.php */