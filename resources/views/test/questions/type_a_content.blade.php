<form id="questionform" action="" method="post">
    {{ csrf_field() }}
    <div class="modal-body">

                    <input type="hidden" name="id" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
                    <input type="hidden" name="old_rank" value="{{(isset($data['results']->id) ? $data['results']->rank : '')}}">
                    <input type="hidden" name="old_personality_id" value="{{(isset($data['results']->id) ? $data['results']->personality_id : '')}}">
                    <input type="hidden" name="type" value="A">
                    <input type="hidden" name="trans_id" value="{{$data['trans_id']}}">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <label>Personality</label>
                                    <select name="personality_id" class="form-control" data-option-id="{{(isset($data['results']->personality_id ) ? $data['results']->personality_id  : '')}}">
                                        <option value="">Select</option>
                                        @foreach($data['personalities'] as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

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
                                 <div class="form-group m-form__group mt-5">
                                      <label></label>
                                    <label class="m-checkbox">
                                        <input type="checkbox" name="is_reverse" class="is_reverse" {{(isset($data['results']->is_reverse) ? $data['results']->is_reverse == 1 ? 'checked' : '' : '')}}> Reverse Question
                                        <span></span>
                                    </label>
                                </div>
                                </div>



                        </div>
                        @foreach($data['languages'] as $key=>$value)
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group m-form__group">
                                    <label>Question {{$value->langname}}</label>
                                    <input type="hidden" name="transalation[{{$key}}][lang_id]" value="{{$value->langid}}">
                                    <input type="hidden" name="transalation[{{$key}}][trans_id]" value="{{isset($value->trans_id) ? $value->trans_id : ''}}">
                                    <textarea class="form-control" name="transalation[{{$key}}][question]">{{(isset($value->question) ? $value->question : '')}}</textarea>
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

