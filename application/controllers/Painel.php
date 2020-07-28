<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('sistema');
        $this->load->library('form_validation');
        init_painel();

    }

    public function index()
    {

        $this->inicio();

    }

    public  function inicio(){

        set_tema('titulo', 'Home');
        set_tema('conteudo', load_modulo('locais', 'gerenciar'));
        set_tema('rodape','');
        load_template();

    }

}



/* End of file Painel.php */

/* Location: ./application/controllers/Painel.php */