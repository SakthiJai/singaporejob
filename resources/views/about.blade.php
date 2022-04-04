@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
  {!! Html::style('/assets/css/datatables.min.css') !!}
@endpush

@section('content')
<style type="text/css">
</style>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
       <form id="about">
         <input type="hidden" name="aid" id="aid" value="1">
          <input type="hidden" name="type" id="type" value="about">
          <label>About You</label>
           <textarea id="mytextarea" name="content"></textarea>

       <div class="form-group"  align="center">
          <button type="button" id="submit" onclick="addAbout()"class="btn btn-primary btn-sm" style="margin-top:15px;">Submit</button>
         <button type="button" class="btn btn-danger btn-sm" style="margin-top:15px;" data-dismiss="modal" role="button">Close</button>
       </div>

       </form>
      </div>
    </div>
  </div>
</div>
<script src=""></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.7/tinymce.min.js'></script>

<script>

    tinymce.init({
      selector: 'textarea',
       // plugins: ["bootstrapaccordion"],

     // plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    //  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
    plugins: [
        "advlist accordion autolink lists link image charmap print code preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
    ], 
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | accordion code",

      toolbar_mode: 'floating', 
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name', 
      height:'500',
    });
    tinymce.PluginManager.add('accordion', function(editor) {
  editor.addButton('accordion', {
    text: 'Accordion',
    icon: false,
    onclick: function onclick() {
      editor.windowManager.open({
        title: 'Accordion Picker',
        body: {
          type: 'textbox',
          name: 'my_textbox',
          layout: 'flow',
          label: '# of accordions'
        },
        onsubmit: function onsubmit(e) {
          var accordionSet = [];
          var curAccordion = Date.now();
          var accordionCount = parseInt(e.data.my_textbox);
          for (var i = 0; i < accordionCount; i++) {
            var panel = '\n                    <div class="panel panel-default">\n                      <div class="panel-heading mceNonEditable productAccordion" role="tab" id="heading' + (curAccordion + i) + '">\n                        <h4 class="panel-title">\n                          <a role="button" data-toggle="collapse" class="mceEditable collapsed" data-parent="#accordion' + curAccordion + '" href="#collapse' + (curAccordion + i) + '" aria-expanded="true" aria-controls="collapse' + (curAccordion + i) + '">\n                            Change this header!\n                          </a>\n                        </h4>\n                      </div>\n                      <div id="collapse' + (curAccordion + i) + '" class="panel-collapse collapse mceNonEditable" role="tabpanel" aria-labelledby="heading' + (curAccordion + i) + '">\n                        <div class="panel-body mceEditable">\n                          <p>Change this content</p>\n                        </div>\n                      </div>\n                    </div>\n                ';
            accordionSet.push(panel);
          }

          var accordion = '\n                    <div class="panel-group" id="accordion' + curAccordion + '" role="tablist" aria-multiselectable="true">\n                      ' + accordionSet.join('') + '\n                  </div>';
          editor.insertContent(accordion);
        }
      });
    }
  });
});

setTimeout(function(){getContent()},3000);
     function addAbout(){        
     
      var formdata=$("#about").serialize();
      //alert($("#id").val());
    console.log( tinymce.get('mytextarea').getContent());
        var url="addAboutYou";
     
    
     $.ajax({
           type:"POST",
            url:url,
           data:{data:tinymce.get('mytextarea').getContent(),type:$('#type').val()}, // serializes the form's elements.
            beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
        }
      },
           success: function(data)
           {
               //console.log(data);
               if(data.result=='Success')
               {
                  location.reload();
               }
           }
         });
  }

function getContent() {
  console.log('121S');
    $.ajax({
        url:"getAbout",
        type: "post",
        data:{_token: $('meta[name="_token"]').attr('content')},
        dataType: "JSON",
        beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
          //  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
        }
    },
        success: function(data)
        {

              //console.log(data.content)
             //$('textarea[name="content"]').val(data.content);
              tinyMCE.activeEditor.setContent(data.data);

        },

        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    // body...
}
  </script>

<style>

.error{
  color: red !important;
  font-size: 12px !important;
}
  .table-responsive{overflow-x:none !important;}
  .center {
    margin-top:50px;   
}

.modal-header {
  padding-bottom: 5px;
}

.modal-footer {
      padding: 0;
  }
    
.modal-footer .btn-group button {
  height:40px;
  border-top-left-radius : 0;
  border-top-right-radius : 0;
  border: none;
  border-right: 1px solid #ddd;
}
  
.modal-footer .btn-group:last-child > button {
  border-right: 0;
}
  </style>

@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
 

@endpush


