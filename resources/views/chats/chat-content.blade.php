<div class="divider d-none">
    <div class="divider-text">Yesterday</div>
</div>
@foreach($data['msg'] as $key=>$value)
<div class="chat chatuser{{$value->sender}} {{$value->chatclass=='receive' ? 'chat-left' : ''}}">
    <div class="chat-avatar">
            <span class="avatar box-shadow-1 cursor-pointer">
                <img src="{{$value->userdp}}" alt="avatar" height="36" width="36" />
            </span>
    </div>
    <div class="chat-body" data-count="{{count($value->messages)}}">
    @foreach($value->messages as $key2=>$value2)
        <?=$value2?>
    @endforeach
    </div>
</div>
@endforeach
