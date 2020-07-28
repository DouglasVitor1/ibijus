//== Class definition

var Inputmask = function () {
    
    //== Private functions
    var demos = function () {
		
		$('#nota').inputmask('9[9],9');
		$('.nota-avaliacao').inputmask('9[9],9');

        $("#telefone_inputmask").inputmask("mask", {
            "mask": "(99) 99999-9999"
        });

        $(".hora_inputmask").inputmask("mask", {
            "mask": "99:99"
        });

        $("#email_inputmask").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
        });

        $("#rg_inputmask").inputmask("mask", {
            "mask": "9999999999"
        });

        $("#cpf_inputmask").inputmask("mask", {
            "mask": "999.999.999-99"
        });

        $("#cnpj_inputmask").inputmask("mask", {
            "mask": "99.999.999/9999-99"
        });

        $("#cep_inputmask").inputmask("mask", {
            "mask": "99999-999"
        });
		
        // date format
        $("#m_inputmask_1").inputmask("mm/dd/yyyy", {
            autoUnmask: true
        });

        // custom placeholder        
        $("#m_inputmask_2").inputmask("mm/dd/yyyy", {
            "placeholder": "*"
        });
        
        // phone number format
        $("#m_inputmask_3").inputmask("mask", {
            "mask": "(999) 999-9999"
        }); 

        // empty placeholder
        $("#m_inputmask_4").inputmask({
            "mask": "99-9999999",
            placeholder: "" // remove underscores from the input mask
        });

        // repeating mask
        $("#m_inputmask_5").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        }); // ~ mask "9" or mask "99" or ... mask "9999999999"
        
        // decimal format
        $("#m_inputmask_6").inputmask('decimal', {
            rightAlignNumerics: false
        }); 
        
        // currency format
        $("#txtPreco").inputmask('999.999,99', {
            numericInput: true
        }); //123456  =>  � ___.__1.234,56

        //ip address
        $("#m_inputmask_8").inputmask({
            "mask": "999.999.999.999"
        });  

        //email address
        $("#m_inputmask_9").inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: false,
            onBeforePaste: function (pastedValue, opts) {
                pastedValue = pastedValue.toLowerCase();
                return pastedValue.replace("mailto:", "");
            },
            definitions: {
                '*': {
                    validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~\-]",
                    cardinality: 1,
                    casing: "lower"
                }
            }
        });        
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    Inputmask.init();
});