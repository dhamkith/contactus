<div id="dha-form" class="dha-col-6">
    <div class="dha-form-card">
        <div class="card-title">
            <h1 class="dha-text-left">{{ __('All the Contact messages') }}</h1>
            <p class="dha-text-left">All the Contact messages.</p>
            @include('contactus::notify.message')
        </div>
        <div class="content p-t-30 p-b-30">
            <div class="cf m-b-15">
                <form action="{{ route('contactus.destroy')}}" method="POST">
                    @csrf
                    <div class="dha-field dha-has-addons">
                        <div class="select-wrap">
                            <select name="action">
                                <option value="default">action...</option>
                                <option value="delete">Delete</option>
                            </select>
                        </div>
                        <div class="button-wrap">
                            <button type="submit" class="">action</button>
                        </div>
                        <input class="input" type="hidden" name="destroy_msgs" value="">
                    </div>
                </form>
            </div>
            @if ( count($messages) > 0 )
                <div class="list-header">
                    <span class="header-col">
                      <input class="is-hidden-touch all-messages" type="checkbox" name="all_messages" id="all-messages">
                      <span class="m-r-20"></span>
                      <strong class="m-l-20">Email</strong>
                    </span>
                    <span class="header-col m-l-40"><strong>Subject</strong></span>
                    <span class="header-col m-l-40"><strong>created_at</strong></span>
                </div>
                <div class="list-body">
                    @foreach($messages as $key => $message)
                    <div class="list-wrapper">
                        <span class="">
                            <input class="" type="checkbox" name="message" value="{{$message->id}}" >
                            @php if( is_null($message->read_at)): $unread = 'unread'; else: $unread = 'read';endif; @endphp
                            @if($unread === 'unread')
                            <i class="notifi-icon  dha dha-envelope envelope-color{{$unread}}"></i>
                            @else
                            <i class="notifi-icon dha dha-envelope-open envelope-color{{$unread}}"></i>
                            @endif
                        </span>
                        <a class="list {{$unread}}" href="{{ route('contactus.show', $message->id) }}">
                            <span class="list-col">{{$message->email}}</span>
                            <span class="list-col">{{$message->subject}}</span>
                            <span class="list-col">{{$message->created_at}} </span>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="pagination-wrapp">
                    {{ $messages->links() }}
                </div>
            @else
                <div class="list-body p-40">
                    <h3>Inbox is empty</h3>
                </div>
            @endif
        </div>
    </div>
</div>
