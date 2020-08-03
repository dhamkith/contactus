<div id="dha-form" class="dha-col-6">
    <div class="dha-form-card">
        <div class="card-title">
            <h1 class="dha-text-left">{{$message->subject}}</h1>
            <p class="dha-text-left">message.</p>
            @include('contactus::notify.message')
        </div>
        <div class="content">
            <div class="message-view">
                @if ( $message )
                    <div class="p-l-20 p-r-20 p-t-6"><small>subject : {{$message->subject}}</small></div>
                    <div class="p-l-20 p-r-20"><small>form : < {{$message->email}} ></small></div>
                    <div class="p-l-20 p-r-20"><small>created_at : {{$message->created_at}}</small></div>
                    <div class="p-l-20 p-r-20"><small>name : {{$message->name}}</small></div>
                    <div class="p-20 is-size-5"><strong>{{$message->subject}} </strong> ,</div>
                    <div class="p-20"><small>{{$message->message}}</small></div>
                @endif
            </div>
        </div>
    </div>
</div>
