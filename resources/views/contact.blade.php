<div id="dha-form" class="dha-col-4">
    <div class="dha-form-card">
        <div class="card-title dha-shadow-none m-t-40">
            <h1 class="dha-text-center">{{ __('Want to contact Us?') }}</h1>
            <p class="dha-text-center">Here are a few ways to get in touch with us.</p>
            @include('contactus::notify.message')
        </div>
        <div class="content dha-shadow-none">
            <form method="POST" action="{{ route('contactus.store') }}">
                @csrf

                <div class="dha-form-field">
                    <label>Name*</label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="dha-form-input {{ $errors->has('name') ? ' is-danger' : '' }}"
                           value="{{ old('name')}}"
                           title="name" placeholder="enter your name" required autofocus>
                    @if ($errors->has('name'))
                        <p class="help is-danger" >{{ $errors->first('name') }}</p>
                    @endif

                </div>

                <div class="dha-form-field">
                    <label>E-Mail Address*</label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="dha-form-input {{ $errors->has('email') ? ' is-danger' : '' }}"
                           value="{{ old('email')}}"
                           title="location email"
                           placeholder="enter your eMail Address" required autofocus>
                    @if ($errors->has('email'))
                        <p class="help is-danger" >{{ $errors->first('email') }}</p>
                    @endif

                </div>

                <div class="dha-form-field">
                    <label>Subject*</label>
                    <input type="text"
                           name="subject"
                           id="subject"
                           class="dha-form-input {{ $errors->has('subject') ? ' is-danger' : '' }}"
                           value="{{ old('subject')}}"
                           title="subject" placeholder="subject here" required autofocus>
                    @if ($errors->has('subject'))
                        <p class="help is-danger" >{{ $errors->first('subject') }}</p>
                    @endif

                </div>

                <div class="dha-form-field">
                    <label>Message*</label>
                    <textarea type="text"
                           name="message"
                           id="message"
                           class="dha-form-input dha-form-textarea {{ $errors->has('message') ? ' is-danger' : '' }}"
                           title="subject"
                           col="12"
                           row="6"
                           placeholder="message here" required autofocus>{{ old('name')}}</textarea>
                    @if ($errors->has('message'))
                        <p class="help is-danger" >{{ $errors->first('message') }}</p>
                    @endif

                </div>

                <button type="submit" class="dha-fullwidth-btn"><span class="dha dha-paper-plane m-r-5"></span> send</button>

            </form>
        </div>
    </div>
</div>
