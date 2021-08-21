<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $message)
        @if(Session::has($message))
            <input id="message" type="hidden" value="{{session($message)}}">

            <input id="messageType" type="hidden" value="{{$message}}" >
        @endif
    @endforeach
</div>
