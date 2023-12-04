   <ul class="nav nav-tabs  m-tabs-line" role="tablist">
              <li class="nav-item m-tabs__item">
            <a class="nav-link m-tabs__link active show fontblack gettab" data-type='{{$type}}' data-status="published{{$type}}" data-other="unpublished{{$type}}" data-toggle="tab" href="#published{{$type}}" role="tab" aria-selected="false" style="color: black !important;width:200px;text-align: center">Published</a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link fontblack gettab" data-type='{{$type}}' data-status="unpublished{{$type}}" data-other="published{{$type}}" data-toggle="tab" href="#unpublished{{$type}}" role="tab" aria-selected="true" style="color: black !important;width:200px;text-align: center">Unpublish</a>
                </li>
            </ul>
              <div class="tab-content">
                <div class="tab-pane active show published{{$type}}" id="published{{$type}}" role="tabpanel">
                    @include('training.alltrainings.traininglist',['results'=>$data['published']])
                   
                </div>
                <div class="tab-pane unpublished{{$type}}" id="unpublished{{$type}}" role="tabpanel">
                    @include('training.alltrainings.traininglist',['results'=>$data['unpublished']]) 

                </div>

            </div>
       
 <script type="text/javascript">
    $(document).ready(function() {    
        $(".gettab").on('click',function(){
            var type=$(this).attr('data-type');
            var status=$(this).attr('data-status');
            var other=$(this).attr('data-other');
           // alert(href);
            $('.'+status).addClass('active');
             $('.'+other).removeClass('active');

               
     
    });
    });
</script>
