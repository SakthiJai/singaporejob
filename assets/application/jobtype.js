console.log('test');
getcategory();
getsectors();
getjoblist();
getsubcategory();
getexperience();
function getjoblist() {
   $.ajax({
        url:"getjoblist",
        type: "GET",
        data:{_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
			var i=1;
			var details =  JSON.parse(JSON.stringify(data));
			
         details.forEach(function(element) {
			 if(element.status==1){

                       var button='Active';
                       var label='Inactive';
                       var color='btn btn-primary btn-sm';
                    }
                    else if(element.status==2){
                      var button='Inactive';
                      var label='active';
                      var color='btn  btn-sm btn-danger';
                    }
			 i=i+1;
           $("#joblist_table").append('<tr><td>'+i+'</td><td>'+element.job_tittle+'</td><td>'+element.cat_name+'</td><td>'+element.sectors_name+'</td><td>'+element.serivce_charge+'</td><td><div class="btn-group"><button type="button" class="'+color+' dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">'+button+'<span class="caret"></span></button><ul class="dropdown-menu"role="menu" style="min-width:4rem;" ><li><button onclick="jobtypeStatus('+element.job_id+','+element.status+')" class="btn-success" style="color:white;background-color: #23BDCF;"  title="Hapus" >'+label+'</button></li></ul></div></td><td><div class="d-flex align-items-center"><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">Edit<i class="typcn typcn-edit btn-icon-append"></i></button><button type="button" class="btn btn-danger btn-sm btn-icon-text">Delete<i class="typcn typcn-delete-outline btn-icon-append"></i></button></div></td></tr>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function getcategory() {
   $.ajax({
        url:"getcategorylist",
        type: "GET",
        data:{_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
			var details =  JSON.parse(JSON.stringify(data));
         details.forEach(function(element) {
           $("#job_Category").append('<option value="'+element.cat_id +'">'+element.cat_name+'</option>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function getsectors() {
   $.ajax({
        url:"getsectors",
        type: "GET",
        data:{_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
			var details =  JSON.parse(JSON.stringify(data));
         details.forEach(function(element) {
           $("#job_sectors").append('<option value="'+element.sectors_id +'">'+element.sectors_name+'</option>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function getsubcategory() {
   $.ajax({
        url:"getsubcategory",
        type: "GET",
        data:{_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
			var details =  JSON.parse(JSON.stringify(data));
         details.forEach(function(element) {
           $("#sub_Category").append('<option value="'+element.sub_cat_id +'">'+element.sub_cat_name+'</option>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function getexperience() {
   $.ajax({
        url:"getexperience",
        type: "GET",
        data:{_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
			var details =  JSON.parse(JSON.stringify(data));
         details.forEach(function(element) {
           $("#job_experience").append('<option value="'+element.exp_id  +'">'+element.exp_range+'</option>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
$(document).ready(function(){
	$.validator.setDefaults({ ignore: ":hidden:not(select)" })
	$.validator.addMethod("requiredSelect", function(element) {
                return ( $("#job_sectors").val() !='-1' );
            }, "You must select an option.");
$('#jobtype_form').validate({
    rules: {
		job_title: 
        {
            required: true,
        },
        job_sectors: 
        {
            required: true,
        },
		sub_Category: 
        {
            required: true,
        },
		job_Category: 
        {
            required: true,
        },
		job_experience: 
        {
            required: true,
        },
		service_charge: 
        {
            required: true,
        },
		required_skills: 
        {
            required: true,
        }
		
    },
messages : {
    job_title: {
    required: "Enter The Job Tittle"
    },
	job_sectors: {
    required: "Select The Job Sectors"
    },
	sub_Category: {
    required: "Select The Subcategory"
    },
	job_Category: {
    required: "Select The Jobcategory"
    },
	job_experience: {
    required: "Select The JobExperience"
    },
	service_charge: {
    required: "Enter The Serivce Charge"
    },
	required_skills: {
    required: "Enter The Requried Skills"
    },
	
 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
            
     
      var formdata=$("#jobtype_form").serialize();
   $.ajax({
			type: "POST",
            url:"addJobtype",
			data: formdata,
			//dataType: "JSON",
			//cache: false,
			//dataType: 'json',
			//async:false,	
			//contentType: false,
			//processData: false,		// serializes the form's elements.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           success: function(data)
           {
                console.log(data.result); 
               //location.reload(); // show response from the php script.
           }
         });
  
      }
 });    


  });
function editcategoryList(id) {
  $("#category-error").hide();
   console.log(id);
   $.ajax({
        url:"editcategoryList",
        type: "post",
        data:{id:id,_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
        cache: false,
			//dataType: 'json',
			//async:false,	
			//contentType: false,
			//processData: false,		// serializes the form's elements.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
             
            $('#id').val(data.id);
            $('#category').val(data.name);
                        
            $("#modal_form").modal("show");
            $('.modal-title').text('Edit Category'); 
             $('#modal_form input').attr('disabled', false); // Disable it.
            $('#submit').show();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

  
}
function viewpetList(id) {
  //alert($('meta[name="_token"]').attr('content'));
   $.ajax({
        url:"editPetList",
        type: "post",
        data:{id:id,_token: $('meta[name="_token"]').attr('content')},
        dataType: "JSON",
        cache: false,
			//dataType: 'json',
			//async:false,	
			contentType: false,
			processData: false,		// serializes the form's elements.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           
        success: function(data)
        {
             
           $('[name="id"]').val(data.id);
            $('[name="pettype"]').val(data.pettype);   
            $("#modal_form").modal("show");
            $('.modal-title').text('View Pet Type');
            $('#modal_form input').attr('disabled', true); // Disable it.
            $('#submit').hide(); 

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

  
}
   
function deletecategoryList(id)
{
    $('.modal-title').text('Delete'); 
	$(".fades").modal("show");
    $("#delete_id").val(id);
}
   
  function deletecategory(id){
      
	var id=$("#delete_id").val();
      $.ajax({
        url:"deletecategory",
        type: "post",
        data:{id:id,_token: $('meta[name="_token"]').attr('content')},
        dataType: "JSON",
        //cache: false,
			//dataType: 'json',
			//async:false,	
			//contentType: false,
			//processData: false,		// serializes the form's elements.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },	
        success: function(data)
        {
          if(data="success"){
           location.reload();
          }
          else{

          }

        },
        
    });
  }  
function addPet() {
	//$('#categoryForm')[0].reset();
	$("#category-error").hide();
	$("#modal_form").modal('show');
	$('.modal-title').text('Add Category');
}
function jobtypeStatus(id,status){
 //alert(status);
    $.ajax({
         url:"jobtypeStatus", 
        type: "post",
        data:{id:id,status:status,_token: $('meta[name="_token"]').attr('content')},
        dataType: "JSON",
        dataType: "JSON",
        //cache: false,
			//dataType: 'json',
			//async:false,	
			//contentType: false,
			//processData: false,		// serializes the form's elements.
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },	
        success: function(data)
        {
          
            if(data.result=='true'){
             location.reload();
            }else{
                 console.log('failed'); 
            }
        },
        
    });
}
function closeform(){
	//$('#categoryForm')[0].reset(); 
}