						  @php
				              $total_record=$data['total'];
				              $perpage=$data['per_page'];
				              $totla_link=round($total_record/$perpage);
				              @endphp
							<div class="catalog-paginate">
								<ul>
									<li><a class="fal fa-angle-left previous" ></a></li>
									@for($i=1; $i<=$totla_link; $i++)
									<li ><a class="pagination pointer link{{$i}} {{$i==1?'linkfocus':'';}}" data-page='{{$i}}'>{{$i}}</a></li>
                                    @endfor
                                    {{csrf_field()}}
									<li><a  class="fal fa-angle-right next" id="button_next"></a></li>
								</ul>
							</div>

