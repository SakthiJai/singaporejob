console.log('test');
getsectorslist();
function getsectorslist() {
   $.ajax({
        url:"getsectorslist",
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
           $("#sectors_table").append('<tbody><tr><td>'+i+'</td><td>'+element.sectors_name+'</td><td><div class="btn-group"><button type="button" class="'+color+' dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">'+button+'<span class="caret"></span></button><ul class="dropdown-menu"role="menu" style="min-width:4rem;" ><li><button onclick="itemsStatus()" class="btn-success" style="color:white;background-color: #23BDCF;"  title="Hapus" >'+label+'</button></li></ul></div></td><td><div class="d-flex align-items-center"><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">Edit<i class="typcn typcn-edit btn-icon-append"></i></button><button type="button" class="btn btn-danger btn-sm btn-icon-text">Delete<i class="typcn typcn-delete-outline btn-icon-append"></i></button></div></td></tr></tbody>');
        });
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
$(document).ready(function(){
	var rowcount=0;
     $('#sectors_table').DataTable({
     "processing": false,
      //"serverSide": true,
      "paging": true,
      "pageLength": 10  ,
      "searching": true,
     
      "info": true,
      orderCellsTop: true,
        fixedHeader: true,
        "lengthChange": false,
        
    
      ajax:{url:"getsectorslist",dataSrc:""},
      "columns": [
          { "data": null,"sortable": false, 
              render: function (data, type, row, meta)
			  { 
               return  rowcount=rowcount+1;
              }  
            },
         { "data": "name" },
		 {         

                 data: null,
                 "render": function ( data, type, row ) {
                    if(row.active==1){

                       var button='Active';
                       var label='Inactive';
                       var color='btn btn-primary btn-sm';
                    }
                    else if(row.active==2){
                      var button='Inactive';
                      var label='active';
                      var color='btn  btn-sm btn-danger';
                    }
                  return '<div class="btn-group"><button type="button" class="'+color+' dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">'+button+'<span class="caret"></span></button><ul class="dropdown-menu"role="menu" style="background: #fffff"><li><button onclick="categoriestatus('+row.id+','+row.active+')" class="btn-success" style="color:white;background-color: #23BDCF;"  title="Hapus" >'+label+'</button></li></ul></div>';
                }
                
            },
        {         
				data: null,
                 "render": function ( data, type, row ) {
                  //console.log(row);
                    //return '<button type="button" onclick="editpetList('+row.id+')" class="btn btn-info btn-fw">Edit</button>&nbsp;<button type="button" onclick="viewpetList('+row.id+')" class="btn btn-success btn-fw">View</button>';
					var buttonHtml ='';
					if(editPermission>0){
						buttonHtml+='<button class="btn btn-success btn-fw" onclick="editcategoryList('+row.id +')"><i class="ri-pencil-line mr-0" style="font-size:15px;"></i></button>&nbsp;'
					}
					if(deletePermission>0)
					{
						buttonHtml+='<button class="btn  btn btn-danger" onclick="deletecategoryList('+row.id +')" style="background-color: #FF9770;border: #FF9770;"><i class="ri-delete-bin-line mr-0"></i></button>';
					}
                   return buttonHtml;
				 }

                
            }
      ]
    });
$('#sectors_form').validate({
    rules: {
		sectors: 
        {
            required: true,
        },
		
    },
messages : {
    sectors: {
    required: "Enter The Sectors"
    },
	
 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
            
     
      var formdata=$("#sectors_form").serialize();
   $.ajax({
			type: "POST",
            url:"addsectors",
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
               location.reload(); // show response from the php script.
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
function categoriestatus(id,status){
 //alert(status);
    $.ajax({
         url:baseUrl+"/categoriestatus", 
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