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

  
$('.copy-btn').click(function() {
  var that = $(this);
        var $temp = $("<input>");
        $("body").append($temp);

        $value = $(this).parent().find('.text-copy');

        $temp.val($($value).text()).select();
        document.execCommand("copy");
        $temp.remove();

        that.closest('.details-list__label-wrap').addClass('active');
        setTimeout(function(){
           that.closest('.details-list__label-wrap').removeClass('active');
        },2000)


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
      $('input[name="document_type"]').val(info.value);
    
      // filter();
    }
  });
});

const country = document.querySelectorAll('[data-select2]');
country.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      $('input[name="country"]').val(info.value);
      // filter();
      var id=info.value;
         $.ajax({
                type: "get",
                url: "/carauctions/getstates/"+id,
                success: function(data) {
                  console.log(data);
                   $('#region').html('');
                  $('#region').append(data);
                }
            });
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

const ocean_option = document.querySelectorAll('[data-ocean]');
ocean_option.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      // filter();
         // $.ajax({
         //        type: "get",
         //        url: "/carauctions/getstates/"+id,
         //        success: function(data) {
         //          console.log(data);
         //           $('#region').html('');
         //          $('#region').append(data);
         //        }
         //    });
    }
  });
});

const shipping = document.querySelectorAll('[data-shipping]');
shipping.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
           var token = $('input[name=_token]').val();
            var id = $('select[name=id]').val();
            var formdata = {'_token':token,'id':id};

        $.ajax({

                  type: "POST",

                  headers: "{'X-CSRF-TOKEN':_token}",

                  url: "/carauctions/ground_shipping_search",

                  data: formdata,
                  dataType:'json',

                  success: function(data) {
                  console.log(data);
                   $('#ocean_shipping').html('');
                   
                    $('.ground_fee').html(data.response);

                    $('#ocean_shipping').append(data.ocean);

                }
          
             });
    }
  });
});


const deliverycountry = document.querySelectorAll('[data-deliverycountry]');
deliverycountry.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      $('input[name="delivery_country"]').val(info.value);
      // filter();
       var id=info.value;
         $.ajax({
                type: "get",
                url: "/carauctions/getstates/"+id,
                success: function(data) {
                  console.log(data);
                   $('#delivery_region').html('');
                  $('#delivery_region').append(data);
                }
            });
    }
  });
});

const region = document.querySelectorAll('[data-region]');
region.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      $('input[name="region"]').val(info.value);
      // filter();
      var id=info.value;
         $.ajax({
                type: "get",
                url: "/carauctions/getcities/"+id,
                success: function(data) {
                  console.log(data);
                   $('#cities').html('');
                  $('#cities').append(data);
                }
            });
    }
  });
});
const deliveryregion = document.querySelectorAll('[data-deliveryregion]');
deliveryregion.forEach(el => {
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
         $.ajax({
                type: "get",
                url: "/carauctions/getcities/"+id,
                success: function(data) {
                  console.log(data);
                   $('#delivery_town').html('');
                  $('#delivery_town').append(data);
                }
            });
      $('input[name="delivery_region"]').val(info.value);
      // filter();
    }
  });
});
const datacity = document.querySelectorAll('[data-city]');
datacity.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      $('input[name="town"]').val(info.value);
      // filter();
    }
  });
});
const deliverytown = document.querySelectorAll('[data-deliverytown]');
deliverytown.forEach(el => {
   const placeholder = el.getAttribute('data-placeholder');
   const hasSearch = el.hasAttribute('data-has-search');
   const isMultiple = el.hasAttribute('multiple');
  const instance = new SlimSelect({
    select: el,
    placeholder: placeholder,
    showSearch: isMultiple || hasSearch,
    onChange: (info) => {
      console.log(info);
      $('input[name="delivery_town"]').val(info.value);
      // filter();
    }
  });
});



  $('.thumbnails').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 2,
        dots: false,
        pauseOnHover: true,
        lazyLoad: 'progressive',
        arrows: true,
        adaptiveHeight: true,
        prevArrow: '<a href="" class="fal fa-angle-left prev thumbnails-arrow"></a>',
        nextArrow: '<a href="" class="fal fa-angle-right next thumbnails-arrow"></a>',
        responsive: [
        {
            breakpoint: 780,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },{
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
    });




$('.thumbnail').on('click', function() {
  var clicked = $(this);
  var newSelection = clicked.data('big');
  var $img = $('.product-image').attr("src", newSelection);
  $('.thumbnail').removeClass('selected');
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



$(function() {
  $('.dropdown-has-child .dropdown-toggle').click(function(e) {
      e.preventDefault();
      $(this).toggleClass('active');
    var sidebarMenuChild = $('.dropdown-menu-child');
    
   sidebarMenuChild.slideToggle();

  });
});





//new js




});
