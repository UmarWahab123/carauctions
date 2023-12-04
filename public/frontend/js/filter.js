document.addEventListener("DOMContentLoaded", function() {



	// $('.home-slider').slick({

 //        infinite: true,

 //        autoplay:true,

 //        slidesToShow: 1,

 //        dots: false,

 //        autoplaySpeed: 6000,

 //        pauseOnHover: true,

 //        lazyLoad: 'progressive',

 //        arrows: true,

 //        adaptiveHeight: true,

 //        prevArrow: '<a href="" class="arrow-slider prev-arrow"><i class="fal fa-chevron-left"></i></a>',

 //        nextArrow: '<a href="" class="arrow-slider next-arrow"><i class="fal fa-chevron-right"></i></a>'

 //    });



    // $('.js-select').select2();



  $('.card-slider').slick({

        infinite: false,

        slidesToShow: 3,

        slidesToScroll: 2,

        dots: false,



        pauseOnHover: true,

        lazyLoad: 'progressive',

        arrows: true,

        adaptiveHeight: true,

        appendArrows: $('.card-slider-arrows'),

        prevArrow: '<a href="" class="arrow-slider prev-arrow"><i class="fal fa-chevron-left"></i></a>',

        nextArrow: '<a href="" class="arrow-slider next-arrow"><i class="fal fa-chevron-right"></i></a>',

        responsive: [

        {

            breakpoint: 1200,

            settings: {

                slidesToShow: 2,

                slidesToScroll: 2,

            }

        },

        {

            breakpoint: 480,

            settings: {

                slidesToShow: 1,

                slidesToScroll: 1

            }

        }

    ]

    });







  function setProgress(index) {

        const calc = ((index + 2) / ($slider.slick('getSlick').slideCount)) * 100;



        $progressBar

            .css('background-size', `${calc}% 100%`)

            .attr('aria-valuenow', calc);



        // $progressBarLabel.text(`${calc.toFixed(2)}% completed`);

    }



    const $slider = $('.card-slider');

    const $progressBar = $('.progress');// const $progressBarLabel = $('.slider__label');



    $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {

        setProgress(nextSlide);

    });



    setProgress(0);





const year = document.querySelectorAll('[data-year]');

year.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      // console.log(info.value);

         var yearfrom=info.value;

         var currentTime = new Date();

         var year = currentTime.getFullYear();

         var yearcontent='';

         for (var i = yearfrom; i <= year; i++) {

           yearcontent+="<option value="+i+">"+i+"</option>";

         }

          $('#year_to').html('');

          $('#year_to').append(yearcontent);

      filter();



    }

  });

});



const yearto = document.querySelectorAll('[data-yearto]');

yearto.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    }

  });

});



const brand = document.querySelectorAll('[data-brand]');

brand.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      console.log(info);

         var id=info.value;

    var lang=$('input[name=lang]').val();


         $.ajax({

                type: "get",

                url: "/carauctions/"+lang+"/getbrandmodels/"+id,

                success: function(data) {

                  console.log(data);

                   $('#model').html('');

                  $('#model').append(data);

                }

            });

      filter();

    }

  });

});



const make = document.querySelectorAll('[data-make]');

make.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      var id=new Array();

      info.forEach((info, i) => {

          id[i]=info.value;

       });

    var _token=$('input[name=_token]').val();



      var formdata={'id':id,_token:_token};

    var lang=$('input[name=lang]').val();



      $.ajax({

                type: "post",

                url: "/carauctions/"+lang+"/getmultiplemodel",

                data:formdata,

                success: function(data) {

                  console.log(data);

                   // $('#multiplemodel').html('');

                  $('#multiplemodel').html(data);

                }

            });

      filter();

      



      }

  });

});



const selects = document.querySelectorAll('[data-select]');

selects.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      console.log(info);

    

    }

  });

});



const auction = document.querySelectorAll('[data-auction]');

auction.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const type = document.querySelectorAll('[data-type]');

type.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});



const multiplemodel = document.querySelectorAll('[data-multiplemodel]');

multiplemodel.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const fueltype = document.querySelectorAll('[data-fueltype]');

fueltype.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const engine = document.querySelectorAll('[data-engine]');

engine.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const transmission = document.querySelectorAll('[data-transmission]');

transmission.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const damage = document.querySelectorAll('[data-damage]');

damage.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});


const bodytype = document.querySelectorAll('[data-bodytype]');

bodytype.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const location = document.querySelectorAll('[data-location]');

location.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const area = document.querySelectorAll('[data-area]');

area.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});

const document_type = document.querySelectorAll('[data-document_type]');

document_type.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      filter();

    

    }

  });

});



const sort = document.querySelectorAll('[data-sort]');

sort.forEach(el => {

   const placeholder = el.getAttribute('data-placeholder');

   const hasSearch = el.hasAttribute('data-has-search');

   const isMultiple = el.hasAttribute('multiple');

  const instance = new SlimSelect({

    select: el,

    placeholder: placeholder,

    showSearch: isMultiple || hasSearch,

    onChange: (info) => {

      $('input[name=sort]').val(info.value);

      filter();

    

    }

  });

});



$(document).on('keyup','.number',function(){

  filter();

});

$(document).on('change','.date',function(){

  filter();

});



$(document).on('change','.buynowcheck',function(){

  filter();

});



$(document).on('change','.excludeacution',function(){

  filter();

});



$(document).on('change','.excludetrading',function(){

  filter();

});

 $(document).on('click','.pagination ',function(){
          var page=$(this).attr('data-page');
        $("input[name=page]").val(page);
          $('.catalog-paginate').find('.pagination').removeClass('linkfocus');
        $(this).addClass('linkfocus');
          filter();
});


 function timecounter(){
    jQuery('.lotlist').each(function() {
    var currentelem=$(this);
    var eventTime = $(this).attr('data-time');
    var currentTime = $(this).attr('data-currunttime');
    
    // var currentTime = '{{strtotime(date('Y-m-d h:i:s'))}}';
    var leftTime = eventTime - currentTime;//Now i am passing the left time from controller itself which 
    var duration = moment.duration(leftTime, 'seconds');
    console.log(duration.asSeconds());
    var interval = 1000;
     if(duration.asSeconds() <= 0){
       currentelem.find('.countdown').html('Auction Closed');
         currentelem.find('.countdown').addClass('auction-close');
       $('.auction-close').addClass('ml-5 mt-1 text-danger ');
      }
     setInterval(function(){
      // Time Out check
      if(duration.asSeconds() <= 0){
        clearInterval(intervalId);
        window.location.reload(true); 
      }
      //Otherwise
      duration = moment.duration(duration.asSeconds() - 1, 'seconds');
       var time=`<div>`+duration.days()+` <span>Days</span></div>
        <div>`+duration.hours()+` <span>Hours</span></div>
        <div>`+duration.minutes()+` <span>Min</span></div>
        <div>`+duration.seconds()+` <span>Sec</span></div>`;
        // console.log('eventTime',eventTime);

        // console.log(time);
      currentelem.find('.countdown').html(time);

    }, interval);
  });
    }




         timecounter();


function filter(){

  // alert('test')

   $('.spinner').removeClass('d-none');

   $('.filter_div').addClass('d-none');

   $('.filter-fields').addClass('d-none');

    var formdata=$("#filter_form").serialize();

    var lang=$('input[name=lang]').val();
                    $('.filter-fields').addClass('d-none');

 

    console.log('Form ',lang);

     $.ajax({

                type: "post",

                url: "/carauctions/"+lang+"/multiplefilter",

                data:formdata,

                dataType:'json',

                success: function(data) {

                  console.log(data.status);

                   $('.filter_div').html('');

                   $('.filter_div').html(data.response);
                    $('.label-green').popover();
                   if(data.offset == 0){
                    // alert('ads');
                   $('.links').html(data.link);
                   }
                    if(data.status == 0){
                    $('.filter-fields').addClass('d-none');
                   }
                   else{
                    $('.filter-fields').removeClass('d-none');
                     timecounter();
                   }


                   $('.spinner').addClass('d-none');

                    $('.filter_div').removeClass('d-none');

                }

            });



}



$('.thumbnail').on('click', function() {

  var clicked = $(this);

  var newSelection = clicked.data('big');

  var $img = $('.product-image').attr("src", newSelection);

  clicked.parent().find('.thumbnail').removeClass('selected');

  clicked.addClass('selected');

  $('.product-image').empty().append($img.hide().fadeIn('fast'));

});



$(".lightgallery").lightGallery();



// new SlimSelect({

//   select: '.slim-select',

//   select: '.slim-select-2'

// });





$('.calc-input button').click(function(e){

    e.preventDefault();

        var button_classes, value = +$('.counter').val();

        button_classes = $(e.currentTarget).prop('class');        

        if(button_classes.indexOf('up_count') !== -1){

            value = (value) + 1;            

        } else {

            value = (value) - 1;            

        }

        value = value < 0 ? 0 : value;

        $('.counter').val(value);

    });  

    $('.counter').click(function(){

        $(this).focus().select();

    });











// // initialize

// telInput.intlTelInput({

//     initialCountry: 'auto',

//     preferredCountries: ['us','gb','br','ru','cn','es','it'],

//     autoPlaceholder: 'aggressive',

//     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js",

//     geoIpLookup: function(callback) {

//         fetch('https://ipinfo.io/json', {

//             cache: 'reload'

//         }).then(response => {

//             if ( response.ok ) {

//                  return response.json()

//             }

//             throw new Error('Failed: ' + response.status)

//         }).then(ipjson => {

//             callback(ipjson.country)

//         }).catch(e => {

//             callback('us')

//         })

//     }

// })



let telInput = $("#phone1")



// initialize

telInput.intlTelInput({

    initialCountry: 'by',

    preferredCountries: ['ru','by','us','br','cn','es','it'],

    autoPlaceholder: 'aggressive',

    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"

})



let telInput2 = $("#phone2")



telInput2.intlTelInput({

    initialCountry: 'by',

    preferredCountries: ['ru','by','us','br','cn','es','it'],

    autoPlaceholder: 'aggressive',

    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/utils.js"

})





var drop = $("input");

drop.on('dragenter', function (e) {

  $(".drop").css({

    "border": "4px dashed #09f",

    "background": "rgba(0, 153, 255, .05)"

  });

  $(".cont").css({

    "color": "#09f"

  });

}).on('dragleave dragend mouseout drop', function (e) {

  $(".drop").css({

    "border": "3px dashed #DADFE3",

    "background": "transparent"

  });

  $(".cont").css({

    "color": "#8E99A5"

  });

});





function handleFileSelect(evt) {

  var files = evt.target.files; // FileList object



  // Loop through the FileList and render image files as thumbnails.

  for (var i = 0, f; f = files[i]; i++) {



    // Only process image files.

    if (!f.type.match('image.*')) {

      continue;

    }



    var reader = new FileReader();



    // Closure to capture the file information.

    reader.onload = (function(theFile) {

      return function(e) {

        // Render thumbnail.

        var span = document.createElement('span');

        span.innerHTML = ['<img class="thumb" src="', e.target.result,

                          '" title="', escape(theFile.name), '"/>'].join('');

        document.getElementById('list').insertBefore(span, null);

      };

    })(f);



    // Read in the image file as a data URL.

    reader.readAsDataURL(f);

  }

}



$('#files').change(handleFileSelect);











//new js













});

