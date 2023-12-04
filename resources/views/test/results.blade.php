@extends('../../layout.header')
@section('title',$data['page_title'])
@section('content')
<!-- BEGIN: Subheader -->
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">{{$data['page_title']}}</h3>
            <button data-toggle="modal" data-target="#savemodal" type="button" class="btn btn-outline-success btn-add">Add Personality</button>
        </div>

    </div>
</div>
<!-- END: Subheader -->

<div class="m-content">


<form id="exportreport" action="" method="post">
                     {{ csrf_field() }}
                     <div class="row">
                    <div class="col-md-4">
                        <div class="form-group m-form__group">
                            <label>From</label>
                            <div class='input-group'>
                                <input name="startdate"  type='text'  class="form-control m-input m_datepicker"  />
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group m-form__group">
                            <label>To</label>
                            <div class='input-group'>
                                <input name="enddate"  type='text'  class="form-control m-input m_datepicker"  />
                                <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                    <div class="form-group m-form__group mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                    </div>
                </form>
<div class="export-div">
<table class="table table-striped- table-bordered table-responsive table-hover table-checkable dynamic-table2">
    <thead class="theme-color">
        <th>Test ID</th>
        <th>Date</th>
        @for($i=1; $i<=9; $i++)
        <th>Type {{$i}} Mean</th>
        <th>Type {{$i}} SD</th>
        <th>Type {{$i}} Excluded</th>
        <!-- <th>Type {{$i}} Excluded In Round</th> -->
        <th>Type {{$i}} is most likely type</th>
        <th>Type {{$i}} Main Personality type</th>
        <th>Type {{$i}} Mean value before stage 3</th>
        <th>Type {{$i}} SD before stage 3</th>
        <th>Type {{$i}} Likelihood</th>
        @endfor
        @for($i=1; $i<=$data['question_columns']; $i++)
        <th>{{$i}} Question ID</th>
        <th>{{$i}} Type</th>
        <th>{{$i}} Value</th>
        @endfor
    </thead>
    <tbody>
        @foreach($data['testresults'] as $key=>$value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->created_at}}</td>
            @for($i=1; $i<=9; $i++)
            @php
              $mean='t'.$i.'mean';
              $sd='t'.$i.'sd';
              $excluded='t'.$i.'excluded';
              $excludedRound='t'.$i.'excludedRound';
              $mostLikely='t'.$i.'mostLikely';
              $main='t'.$i.'main';
              $meansBefore3='t'.$i.'meansBefore3';
              $sdBefore3='t'.$i.'sdBefore3';
              $Likelyhood='t'.$i.'Likelyhood';
              $columns=count($value->items);
              $remaining=$data['question_columns']-$columns;
         @endphp
            <td>{{$value->$mean}}</td>
            <td>{{$value->$sd}}</td>
            <td>{{$value->$excluded}}</td>
            <!-- <td>{{$value->$excludedRound}}</td> -->
            <td>{{$value->$mostLikely}}</td>
            <td>{{$value->$main}}</td>
            <td>{{$value->$meansBefore3}}</td>
            <td>{{$value->$sdBefore3}}</td>
            <td>{{$value->$Likelyhood}}</td>
            @endfor
            @foreach($value->items as $key2=>$value2)
            <td>{{$value2->question_id}}</td>
            <td>{{$value2->type}},{{$value2->personality_id}}</td>
            <td>{{check_reverse($value2->is_reverse,$value2->answer)}}</td>
            @endforeach
            @for($i=1; $i<=$remaining; $i++)
            <td></td>
            <td></td>
            <td></td>
            @endfor

        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
<div class="loader text-center hide">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>
@section('js')
<script type="text/javascript">
 $('#exportreport').submit(function(e) {
        if ( $.fn.DataTable.isDataTable('.dynamic-table2') ) {
            $('.dynamic-table2').DataTable().destroy();
        }

        $('.dynamic-table2 tbody').empty();
        e.preventDefault();
        var token = $('input[name=_token]').val();
        var formdata=$(this).serialize();
        $('.export-div').addClass('hide');
        $('.loader').removeClass('hide');
        $.ajax(
                {
                    type:"post",
                    headers: {'X-CSRF-TOKEN': token},
                    url: "{{url('admin/exporttest') }}",
                    dataType: "json",
                    data:formdata,
                    success:function(data)
                    {

                        $('.export-div').html(data.response);
                        $('.export-div').removeClass('hide');
                        $('.loader').addClass('hide');
                        jqDatatable2('dynamic-table2');
                    }
                });
    });
</script>
@endsection
@endsection
