T<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/js/vendors.min.js')}}">
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/pages/app-calendar-events.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/pages/app-calendar.js')}}"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });


    $(document).ready(function(){
          $(document).on('click','.language ',function(){
       var language=$(this).attr("data-lang");
       var value=$(this).attr("data-value");
       
            $.ajax({
                type: "get",
                url: "{{url('/langsession') }}/"+language,
                success: function(data) {
                 changeLanguageByButtonClick(language);
                  $(".languagetest").html(value.toUpperCase());
                }
            });

     });
                         <?php
                           $lang='en';
                            if(Session::has('lang')):
                                $lang=Session::get('lang');
                                ?>
                                changeLanguageByButtonClick('{{$lang}}');
                             <?php  endif;?>
   
   }); 
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}

function changeLanguageByButtonClick(language) {
  // var language = document.getElementById("language").value;
  var selectField = document.querySelector("#google_translate_element select");
  for(var i=0; i < selectField.children.length; i++){
    var option = selectField.children[i];
    // find desired langauge and change the former language of the hidden selection-field 
    if(option.value==language){
       selectField.selectedIndex = i;
       // trigger change event afterwards to make google-lib translate this side
       selectField.dispatchEvent(new Event('change'));
       break;
    }
  }
  }

</script>
