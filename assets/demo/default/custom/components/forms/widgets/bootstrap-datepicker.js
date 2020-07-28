//== Class definition

var BootstrapDatepicker = function () {
    
    //== Private functions
    var demos = function () {
        // minimum setup
        $('#m_datepicker_1, #m_datepicker_1_validate').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			todayBtn: true,
            todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
		$('#m_datepicker_5, #m_datepicker_5_validate').datepicker({
			format: 'dd/mm/yyyy',
			autoclose: true,
			todayBtn: true,
            todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });
		
		// coloca data atual no datepicker
		$('.input-group-addon.date').click(function(event){
			$("#m_datepicker_1").datepicker('hide');
			var d = new Date();
			var dia = d.getDate();
			var mes = d.getMonth();

			var month = new Array();
			month[0] = "01";
			month[1] = "02";
			month[2] = "03";
			month[3] = "04";
			month[4] = "05";
			month[5] = "06";
			month[6] = "07";
			month[7] = "08";
			month[8] = "09";
			month[9] = "10";
			month[10] = "11";
			month[11] = "12";
			var mes_n = month[d.getMonth()];

			var ano = d.getFullYear();

			if(dia<10) {
				dia = "0"+dia;
			} else {
				dia = dia;
			}

			$("#m_datepicker_1").val(''+dia+'/'+mes_n+'/'+ano+'');
		});
		$('.input-group-addon.date2').click(function(event){
			$("#m_datepicker_5").datepicker('hide');
			var d = new Date();
			var dia = d.getDate();
			var mes = d.getMonth();

			var month = new Array();
			month[0] = "01";
			month[1] = "02";
			month[2] = "03";
			month[3] = "04";
			month[4] = "05";
			month[5] = "06";
			month[6] = "07";
			month[7] = "08";
			month[8] = "09";
			month[9] = "10";
			month[10] = "11";
			month[11] = "12";
			var mes_n = month[d.getMonth()];

			var ano = d.getFullYear();

			if(dia<10) {
				dia = "0"+dia;
			} else {
				dia = dia;
			}

			$("#m_datepicker_5").val(''+dia+'/'+mes_n+'/'+ano+'');
		});

        // minimum setup for modal demo
        $('#m_datepicker_1_modal').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // input group layout 
        $('#m_datepicker_2, #m_datepicker_2_validate').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // input group layout for modal demo
        $('#m_datepicker_2_modal').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // enable clear button 
        $('#m_datepicker_3, #m_datepicker_3_validate').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // enable clear button for modal demo
        $('#m_datepicker_3_modal').datepicker({
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // orientation 
        $('#m_datepicker_4_1').datepicker({
            orientation: "top left",
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        $('#m_datepicker_4_2').datepicker({
            orientation: "top right",
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        $('#m_datepicker_4_3').datepicker({
            orientation: "bottom left",
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        $('#m_datepicker_4_4').datepicker({
            orientation: "bottom right",
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

        // range picker
        $('#m_datepicker_5').datepicker({
			format: 'dd/mm/yyyy',
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        });

         // inline picker
        $('#m_datepicker_6').datepicker({
            todayHighlight: true,
            templates: {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
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
    BootstrapDatepicker.init();
});