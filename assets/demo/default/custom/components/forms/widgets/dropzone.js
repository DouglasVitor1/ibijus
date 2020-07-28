//== Class definition

function refreshIframe() {
	var ifr = document.getElementsByName('imagens')[0];
	ifr.src = ifr.src;
}

var DropzoneDemo = function () {    
    //== Private functions
    var demos = function () {
        // single file upload
        Dropzone.options.mDropzoneOne = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };

        // multiple file upload
        Dropzone.options.mDropzoneTwo = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: false,
			createImageThumbnails: false,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
					this.on("complete", function(file) {
					  this.removeFile(file);
					});
					this.on("queuecomplete", function (file) {
					  refreshIframe();
					});
                }
            }   
        };

        // file type validation
        Dropzone.options.mDropzoneThree = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: null,
            maxFilesize: 0.5, // MB
            addRemoveLinks: false,
			createImageThumbnails: false,
            acceptedFiles: "image/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
					this.on("complete", function(file) {
					  this.removeFile(file);
					});
					this.on("queuecomplete", function (file) {
					  refreshIframe();
					});
                }
            }   
        };
		
		// file type validation 2
        Dropzone.options.mDropzoneFour = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: null,
            maxFilesize: 10, // MB
            addRemoveLinks: false,
			createImageThumbnails: false,
            acceptedFiles: "image/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
					this.on("complete", function(file) {
					  this.removeFile(file);
					});
					this.on("queuecomplete", function (file) {
					  refreshIframe();
					});
                }
            }   
        };
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

DropzoneDemo.init();