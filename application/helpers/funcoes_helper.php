<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//carrega modulo do sistema devolvendo a tela solicitada
function load_modulo($modulo = NULL, $tela = NULL, $diretorio = 'painel') {
    $CI = & get_instance();
    if ($modulo != NULL) {
        return $CI->load->view("$diretorio/$modulo", array('tela' => $tela), TRUE);
    } else {
        return FALSE;
    }
}

//seta valores  ao array tema da classe sistema
function set_tema($prop, $valor, $replace = TRUE) {
    $CI = & get_instance();
    $CI->load->library('sistema');
    if ($replace) {
        $CI->sistema->tema[$prop] = $valor;
    } else {
        if (!isset($CI->sistema->tema[$prop])) {
            $CI->sistema->tema[$prop] = '';
        }
        $CI->sistema->tema[$prop].=$valor;
    }
}

function get_tema() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    return $CI->sistema->tema;
}

function init_painel() {
    $CI = & get_instance();
    $CI->load->library(array('sistema', 'session', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));
	$CI->load->model('locais_model', 'locais');
    
    set_tema('titulo_padrao', 'Ibijus');
    set_tema('rodape', '<p>&copy ' . date('Y') . ' | todos os direitos reservados</p>');
    set_tema('template', 'painel_view');
    set_tema('headerinc', load_css(array(
        'bootstraps')), FALSE);
    set_tema('footerinc', load_js(array(
        'charts')), FALSE);
}

function load_template() {
    $CI = & get_instance();
    $CI->load->library('sistema');
    $CI->parser->parse($CI->sistema->tema['template'], get_tema());
}

//carregar arquivos css de uma pasta
function load_css($arquivo = NULL, $pasta = 'css', $media = 'all') {
    if ($arquivo != NULL) {
        $CI = & get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $css) {
                $retorno .='<link rel="stylesheet" type="text/css" href="' . base_url("$pasta/$css.css") . '" media="' . $media . '" />';
            }
        } else {
            $retorno = '<link rel="stylesheet" type="text/css" href="' . base_url("$pasta/$arquivo.css") . '" media="' . $media . '" />';
        }
    }
    return $retorno;
}

//carrega arquivos js de uma pasta ou servidor remoto
function load_js($arquivo = NULL, $pasta = 'js', $remoto = FALSE) {
    if ($arquivo != NULL) {
        $CI = & get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $js) {
                if ($remoto) {
                    $retorno.='<script  type="text/javascript" src="' . $js . '"></script>';
                } else {
                    $retorno.='<script  type="text/javascript" src="' . base_url("$pasta/$js.js") . '"></script>';
                }
            }
        } else {
            if ($remoto) {
                $retorno.='<script  type="text/javascript" src="' . $arquivo . '"></script>';
            } else {
                $retorno.='<script  type="text/javascript" src="' . base_url("$pasta/$arquivo.js") . '"></script>';
            }
        }
    }
    return $retorno;
}

//mostra erros formularios
function erros_validacao() {
    if (validation_errors()) {
        echo '<div class="panel-alert">
                <div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong><i class="icon wb-close margin-right-10" aria-hidden="true"></i> ' . validation_errors('<span>', '</span><br>') . '</strong>
                </div>
            </div>';
    }
}

//definie mensagem para ser exibida na proxima tela carregada
function set_msg($id = "msgerro", $msg = NULL, $tipo = "erro") {
    $CI = & get_instance();
    $CI->load->library('session');
    switch ($tipo) {
        case 'erro':
            $CI->session->set_flashdata($id, '<div class="panel-alert">
                                                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong><i class="icon fa fa-close margin-right-10" aria-hidden="true"></i> ' . $msg . '</strong>
                                                </div>
                                            </div>');
            break;
        case 'sucesso':
            $CI->session->set_flashdata($id, '<div class="panel-alert">
                                                <div class="m-alert m-alert--outline alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong><i class="icon fa fa-check margin-right-10" aria-hidden="true"></i> ' . $msg . '</strong>
                                                </div>
                                            </div>');
            break;	
		case 'info':
            $CI->session->set_flashdata($id, '<div class="panel-alert">
                                                <div class="m-alert m-alert--outline alert alert-info alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong><i class="icon fa fa-check margin-right-10" aria-hidden="true"></i> ' . $msg . '</strong>
                                                </div>
                                            </div>');
            break;
        default:
            $CI->session->set_flashdata($id, '<div class="panel-alert">
                                                <div class="m-alert m-alert--outline alert alert-primary alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong><i class="icon fa fa-info margin-right-10" aria-hidden="true"></i> ' . $msg . '</strong>
                                                </div>
                                            </div>');
            break;
    }
}

//verifica se existe mensagem para ser exibida
function get_msg($id, $printar = TRUE) {
    $CI = & get_instance();
    $CI->load->library('session');
    if ($CI->session->flashdata($id)) {
        if ($printar) {
            echo $CI->session->flashdata($id);
            return TRUE;
        } else {
            return $CI->session->flashdata($id);
        }
    }
    return FALSE;
}
