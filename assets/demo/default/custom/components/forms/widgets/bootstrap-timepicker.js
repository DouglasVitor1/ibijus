//== Class definition

var BootstrapTimepicker = function () {
    
    //== Private functions
    var demos = function () {
        // minimum setup
        $('#m_timepicker_1, #m_timepicker_1_modal').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: false,
            showMeridian: false,
            snapToStep: true
        });
		$('#m_timepicker_5, #m_timepicker_5_modal').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: false,
            showMeridian: false,
            snapToStep: true
        });
		
		// coloca hora atual no timepicker
		$('.input-group-addon.time').on('click', function(e){
			e.preventDefault();
			var d = new Date();
			var minutos = d.getMinutes();
			if(parseInt(minutos)<10) {
				minutos = "0"+minutos;
			} else {
				minutos = minutos;
			}
			$('#m_timepicker_1').val('');
			$('#m_timepicker_1').val('' + d.getHours() + ':' + minutos + '');
		});
		$('.input-group-addon.time2').on('click', function(e){
			e.preventDefault();
			var d = new Date();
			var minutos = d.getMinutes();
			if(parseInt(minutos)<10) {
				minutos = "0"+minutos;
			} else {
				minutos = minutos;
			}
			$('#m_timepicker_5').val('');
			$('#m_timepicker_5').val('' + d.getHours() + ':' + minutos + '');
		});

        // minimum setup
        $('#m_timepicker_2, #m_timepicker_2_modal').timepicker({
            minuteStep: 1,
            defaultTime: '',
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
        });

        // default time
        $('#m_timepicker_3, #m_timepicker_3_modal').timepicker({
            defaultTime: '11:45:20 AM',
            minuteStep: 1,
            showSeconds: true,
            showMeridian: true
        });

        // default time
        $('#m_timepicker_4, #m_timepicker_4_modal').timepicker({
            defaultTime: '10:30:20 AM',           
            minuteStep: 1,
            showSeconds: true,
            showMeridian: true
        });

        // validation state demos
        // minimum setup
        $('#m_timepicker_1_validate, #m_timepicker_2_validate, #m_timepicker_3_validate').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
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
    BootstrapTimepicker.init();
});