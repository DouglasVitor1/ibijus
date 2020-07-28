//== Class definition
var WizardDemo = function () {
    //== Base elements
    var wizardEl = $('#m_wizard');
    var formEl = $('#m_form');
    var validator;
    var wizard;
    
    //== Private functions
    var initWizard = function () {
        //== Initialize form wizard
        wizard = wizardEl.mWizard({
            startStep: 1
        });

        //== Validation before going to next page
        wizard.on('beforeNext', function(wizard) {
            if (validator.form() !== true) {
                return false;  // don't go to the next step
            }
        })

        //== Change event
        wizard.on('change', function(wizard) {
            mApp.scrollTop();
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            //== Validate only visible fields
            ignore: ":hidden",

            //== Validation rules
            rules: {
                //=== Client Information(step 1)
                //== Client details
                titulo: {
                    required: true 
                },
                data_publicacao: {
                    required: true
                },       
                hora_publicacao: {
                    required: true
                },
				data_publicacao2: {
                    required: true
                },       
                hora_publicacao2: {
                    required: true
                }
            },
			
			//== Validation messages
            messages: {
                'titulo': {
                    required: 'Campo obrigatório'
                },
				'data_publicacao': {
                    required: 'Campo obrigatório'
                },
				'data_publicacao2': {
                    required: 'Campo obrigatório'
                },
				'hora_publicacao': {
                    required: 'Campo obrigatório'
                },
				'hora_publicacao2': {
                    required: 'Campo obrigatório'
                },
            },
            
            //== Display error  
            invalidHandler: function(event, validator) {     
                mApp.scrollTop();

                swal({
                    "title": "", 
                    "text": "Há alguns erros no formulário.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                });
            },

            //== Submit valid form
            submitHandler: function (form) {
                
            }
        });   
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-wizard-action="submit"]');

        btn.on('click', function(e) {
            
			document.getElementById("m_form").submit()
			
			/*
			
			e.preventDefault();

            if (validator.form()) {
                //== See: src\js\framework\base\app.js
                mApp.progress(btn);
                //mApp.block(formEl); 

                //== See: http://malsup.com/jquery/form/#ajaxSubmit
                formEl.ajaxSubmit({
                    success: function() {
                        mApp.unprogress(btn);
                        //mApp.unblock(formEl);

                        swal({
                            "title": "", 
                            "text": "The application has been successfully submitted!", 
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                        });
                    }
                });
            }*/
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = $('#m_wizard');
            formEl = $('#m_form');

            initWizard(); 
            initValidation();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function() {    
    WizardDemo.init();
});