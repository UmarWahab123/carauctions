<form id="questionform" action="" method="post">
    {{ csrf_field() }}
    <div class="modal-body">
                    <input type="hidden" name="id" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                       <input type="hidden" name="old_rank" value="{{(isset($data['results']->id) ? $data['results']->rank : '')}}">
                    <input type="hidden" name="type" value="B">
                    <input type="hidden" name="trans_id" value="{{$data['trans_id']}}">
                    <div class="m-portlet__body">
                        <div class="row">
                                <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <label>Rank</label>
                                    <select name="rank" class="form-control" data-option-id="{{(isset($data['results']->rank) ? $data['results']->rank : '')}}">
                                        <option value="">Select</option>
                                        @for($i=1; $i<=20; $i++)
                                        <option > {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <label>Personality Type A</label>
                                    <select name="statement_a_pid" class="form-control" data-option-id="{{(isset($data['results']->statement_a_pid ) ? $data['results']->statement_a_pid  : '')}}">
                                        <option value="">Select</option>
                                        @foreach($data['personalities'] as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <label>Personality Type B</label>
                                    <select name="statement_b_pid" class="form-control" data-option-id="{{(isset($data['results']->statement_b_pid ) ? $data['results']->statement_b_pid  : '')}}">
                                        <option value="">Select</option>
                                        @foreach($data['personalities'] as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        @foreach($data['languages'] as $key=>$value)
                        <input type="hidden" name="transalation[{{$key}}][lang_id]" value="{{$value->langid}}">
                        <input type="hidden" name="transalation[{{$key}}][trans_id]" value="{{isset($value->trans_id) ? $value->trans_id : ''}}">

                        <div class="row">
                              <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label>Statement Text A  {{$value->langname}}</label>
                                    <textarea class="form-control" name="transalation[{{$key}}][statement_a_text]">{{(isset($value->statement_a_text ) ? $value->statement_a_text  : '')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label>Statement Text B  {{$value->langname}}</label>
                                    <textarea class="form-control" name="transalation[{{$key}}][statement_b_text]">{{(isset($value->statement_b_text ) ? $value->statement_b_text  : '')}}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <span type="submit" class="btn btn-primary savequestion">Save</span>
    </div>
</form>
