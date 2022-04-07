//getroleslist();
$(document).ready(function(){
$('#experience_range').validate({
    rules: {
        experience_range: 
        {
            required: true,
        },
		email: 
        {
            required: true,
        },
		password: 
        {
            required: true,
        },
    },
messages : {
    experience_range: {
    required: "Enter The Experience Range"
    },
	
 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
  
      }
 });  


  });