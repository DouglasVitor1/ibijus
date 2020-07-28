$(document).ready(function () {
	
	// DataTables
	$('#dataTable').DataTable();
	
	$('#dataTable2').DataTable(
		{
			"order": [[ 3, "desc" ]]
		}
	);
	
	$('#dataTable3').DataTable(
		{
			"order": [[ 0, "asc" ],[ 2, "asc" ]]
		}
	);
	
	$('#dataTable4').DataTable(
		{
			"order": [[ 0, "desc" ]]
		}
	);
	
	$('#dataTable5').DataTable(
		{
			"order": [[ 1, "asc" ]]
		}
    );
    
    $('#dataTable6').DataTable(
		{
			"order": [[ 2, "asc" ],[ 0, "asc" ]]
		}
	);
    
    $("#dataTable, #dataTable2, #dataTable3, #dataTable4, #dataTable5, #dataTable6").on("click", ".modal_ativar", function() {
        var id = $(this).data('id'); 
        $('.i_modal_ativar').val(id);
        $('#m_modal_ativar').modal('show');
    });
    
    $("#dataTable, #dataTable2, #dataTable3, #dataTable4, #dataTable5, #dataTable6").on("click", ".modal_inativar", function() {
        var id = $(this).data('id'); 
        $('.i_modal_inativar').val(id);
        $('#m_modal_inativar').modal('show');
    });
	
	$("#dataTable, #dataTable2, #dataTable3, #dataTable4, #dataTable5, #dataTable6").on("click", ".modal_excluir", function() {
		var id = $(this).data('id');
		$( ".i_modal_excluir" ).val( id );
		$('#m_modal_excluir').modal('show');
	});
	
	//botões de atalhos de conteúdo
	if ($("#editor").length > 0) {
	
        CKEDITOR.replace( 'editor', {
            disallowedContent: 'img{width,height};',
            removePlugins: 'contextmenu,liststyle,tabletools,tableselection'
        });
        
        CKEDITOR.on('instanceReady', function (ev) {
        ev.editor.dataProcessor.htmlFilter.addRules(
            {
                elements:
                {
                    $: function (element) {
                        // Remove style attribute from images
                        if (element.name == 'img') {
                            delete element.attributes.style;
                        }

                        return element;
                    }
                }
            });
        });
    
    }

});

// =================== Busca CEP =================== //

function findCEP() {

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#logradouro").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#numero").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep_inputmask").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#numero").focus();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulario_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            alert("Favor informar o CEP para a consulta.");
            limpa_formulario_cep();
        }
    });
}

