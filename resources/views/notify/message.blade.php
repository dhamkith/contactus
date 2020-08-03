@if(count($errors) > 0 )
    @foreach($errors->all() as $error )
        <div id="dha-package-js-notifies" class="dha-package-js-notifies">
            <a class="dha-package-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
            <div class="js-notify">ERROR: {{$error}}</div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div id="dha-package-js-notifies" class="dha-package-js-notifies success">
        <a class="dha-package-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
        <div class="js-notify">{{session('success')}}</div>
    </div>
@endif

@if(session('error'))
    <div id="dha-package-js-notifies" class="dha-package-js-notifies">
        <a class="dha-package-notify__cross" href="javascript:void(0);"><span class="notify-close"></span></a>
        <div class="js-notify">ERROR: {{session('error')}}</div>
    </div>
@endif