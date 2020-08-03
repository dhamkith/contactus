# Laravel contactus package

contactus 

## Installation

Installation is straightforward, setup is similar to every other Laravel Package.

#### 1. Install via Composer

Begin by pulling in the package through Composer:

```
composer require dhamkith/contactus
```
 
#### 2. Define the Service Provider and alias

Next we need to pull in the alias and service providers.

**Note:** This package supports the new _auto-discovery_ features of Laravel 5.5, so if you are working on a Laravel 5.5 project, then your install is complete, you can skip to step 3.

If you are using Laravel 5.0 - 5.4 then you need to add a provider and alias. Inside of your `config/app.php` define a new service provider

```
'providers' => [
	//  other providers

	Dhamkith\Contactus\ContactUsServiceProvider::class,
];
```

Then we want to define an alias in the same `config/app.php` file.

```
'aliases' => [
	// other aliases

	'Contact' => Dhamkith\Contactus\Facades\DhamkithContact::class,
];
```

#### 3. Publish Config File and Other Resources (OPTIONAL)

The config file allows you to override default settings of this package to meet your specific needs. It is optional and allows you to set a 

* Set contactus email - `"email" => "site email address"` (OPTIONAL),
* URL path - `"path" => "dhamkith"`,
* middleware for ContactUsController - `"middleware_for_view" => "auth"`, 
* `"auth"` is defalt middleware You can override this value if,
* your application suported Multiple Authentication you can change to `"auth:admin"` 

To generate a config file and other resources type this command into your terminal:

```
php artisan vendor:publish --tag=contactus
```

This generates 

* a config file at `config/dhamkith_contactus.php`.
* a view file at `resources/views/vendor/contactus/contact.blade.php`. 
* a view file at `resources/views/vendor/contactus/index.blade.php`. 
* a view file at `resources/views/vendor/contactus/show.blade.php`. 
* a style file at `public/css/dhamkith-contactus.css`.
* a javascript file at `public/js/dhamkith-contactus.js`.
 
#### 4. Migrate (OPTIONAL)

php artisan migrate for create contact_us table

```
php artisan migrate
```

## Usage

This package is easy to use. It provides a handful of helpful View. 

* `contact.blade.php` view for display contact us from,
* `index.blade.php` view for display all contact messages,
* `show.blade.php` view for display message,




#### 1. add style and javascript file

adding dhamkith-contactus.css stylesheet tag to 'app' or other layout, in head section 

```php
<head>

<!-- Other code here -->
<link href="{{ asset('css/dhamkith-contactus.css') }}" rel="stylesheet">

</head>
```

adding dhamkith-contactus.js  script tag in body section 

```php
<body>
<!-- Other html code here  -->

<!-- scripts -->
<script src="{{ asset('js/dhamkith-contactus.js') }}" defer></script> 

</body>
```

#### 2. extends views

extends views `contact, index, show`

**Example:** view contact `resources/views/vendor/contactus/contact.blade.php` 

```php 
@extends('layouts.app')

@section('content')
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
@endsection

```

#### 3. use package router

package router names are 
###### for display all store contact messages `contactus.lists` 
```php 
{{ route('contactus.lists') }}
```
###### for get contact us from `contactus.create`
```php 
{{ route('contactus.create') }}
```
###### for display single message `contactus.show`
```php 
{{ route('contactus.show') }}
```   

## Contribute

I encourage you to contribute to this package to improve it and make it better. Even if you don't feel comfortable with coding or submitting a pull-request (PR), you can still support it by submitting issues with bugs or requesting new features, or simply helping discuss existing issues to give us your opinion and shape the progress of this package. 

## Contact

I would love to hear from you. I run the dhamkith channel on [YouTube](https://www.youtube.com/user/dhamkith/videos), please subscribe and check out the videos.

You can also email me at dhamkith@gmail.com for any other requests.