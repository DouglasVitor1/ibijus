//== Class definition

var SummernoteDemo = function () {    
    //== Private functions
    var demos = function () {
        /*$('.summernote').summernote({
            // height: 150, 
			minHeight: 450,
        });*/
		$('.summernote').summernote({
			disableDragAndDrop: true,
			minHeight: 450,
			maxHeight: 620,
			dialogsInBody: true,
			dialogsFade: false,
        popover: {
            image: [
                ['custom', ['imageAttributes']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        },
        lang: 'pt-BR', // Change to your chosen language
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty:false, // true = remove attributes | false = leave empty if present
            disableUpload: false // true = don't display Upload Options | Display Upload Options
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

//== Initialization
jQuery(document).ready(function() {
    SummernoteDemo.init();
});