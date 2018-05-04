var UIToastrMsn = function() {
    return {
        init: function(type,title,content) {
         
		   toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "positionClass": "toast-top-center",
			  "onclick": null,
			  "showDuration": "1000",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}		
			//error,warning,info,success
			//toastr[type]("Gnome & Growl type non-blocking notifications", "Toastr Notifications");	
			toastr[type](content,title);		 
        }
    }
}();