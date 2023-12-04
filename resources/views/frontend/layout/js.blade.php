
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.6.1/slimselect.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.1/dist/sweetalert2.all.min.js"></script>
		<script src="{{ asset('frontend/js/app.js')}}" ></script>
		<script src="{{ asset('frontend/js/intlTelInput.min.js')}}" ></script>
		<script src="{{ asset('frontend/js/lightgallery.min.js')}}" ></script>
		<script src="{{ asset('frontend/countdown/moment.js')}}" ></script>
		<script src="{{ asset('frontend/countdown/moment_data.js')}}" ></script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
<script type="text/javascript">
	
function success(icon,title,text){
	Swal.fire({
		icon: icon,
		title: title,
		text: text,
	});
	}
	
	$(document).ready(function(){
      
      $(document).on('click','.searchbutton',function(){
        var searchinput=$('input[name=search]').val();
        if(searchinput==''){
        alert('Write something before proceeding');
        return false;
        }
      });

		  $(document).on('click','.language ',function(){
		  	// alert(document.location.pathname);
		  	var href=$(this).attr('data-href');
		  	var lang=$(this).attr('data-lang');
		  	// var main_url=document.location.href;
		  	// let text = document.location.pathname.split('/');
     //        var url= main_url.replace(text[2], lang);
     //        location.href=url;
            $.ajax({
                type: "get",
                url: "{{url('/test') }}/"+lang,
                success: function(data) {
                	var main_url=document.location.href;
		  	let text = document.location.pathname.split('/');
            var url= main_url.replace(text[2], lang);
            location.href=url;
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


		
		


