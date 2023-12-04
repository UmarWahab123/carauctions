<!-- Submit Chat form -->
<form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">
    {{ csrf_field() }}
    <div class="input-group input-group-merge mr-1 form-send-message">
        <div class="input-group-prepend">
            <span class="speech-to-text input-group-text"><i data-feather="message-square" class="cursor-pointer"></i></span>
        </div>
        <input type="text" class="form-control message" placeholder="Type your message or use speech to text" />
        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <label for="attach-doc" class="attachment-icon mb-0">
                                                    <i data-feather="image" class="cursor-pointer lighten-2 text-secondary"></i>
                                                    <input type="file" id="attach-doc" hidden /> </label></span>
        </div>
    </div>
    <input type="hidden" name="sender" value="{{Auth::user()->id}}">
    <input type="hidden" name="userdp" value="{{Auth::user()->dp}}">
    <input type="hidden" name="receiver" value="">


    <button type="button" class="btn btn-primary send" onclick="enterChat();">
        <i data-feather="send" class="d-lg-none"></i>
        <span class="d-none d-lg-block">Send</span>
    </button>
</form>
<!--/ Submit Chat form -->