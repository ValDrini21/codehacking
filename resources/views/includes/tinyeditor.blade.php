<script src="https://cdn.tiny.cloud/1/k7j8r97v4fot18nn8920i6vnh3uscfjzknou42xxzgdeaevt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script> --}}


<script>
    var editor_config = {
      path_absolute : "/",
      selector: 'textarea',
      relative_urls: false,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table directionality",
        "emoticons template paste textpattern",
        "a11ychecker export advcode casechange formatpainter linkchecker insert mediaembed pageembed permanentpen "
        +"powerpaste checklist advtable tinymcespellchecker emoticons toc"
      ],
      toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |"
      + " bullist numlist outdent indent | insertfile link image media | a11ycheck | casechange | formatpainter | checklist "
      + " | export | pageembed | permanentpen | addcomment | showcomments | save",
      tinydrive_token_provider: function (success, failure) {
      success({ token: 'jwt-token' });
      // failure('Could not create a jwt token')
        },
      file_picker_callback : function(callback, value, meta) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
        if (meta.filetype == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.openUrl({
          url : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no",
          onMessage: (api, message) => {
            callback(message.content);
          }
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>