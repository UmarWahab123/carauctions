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

<script>
</script>