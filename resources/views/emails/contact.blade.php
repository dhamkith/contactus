@component('mail::message')
<div style="box-sizing: border-box;background-color: #fcfcfc;color: #131313;padding: 1rem;border-bottom: 6px solid #00d1b2; border-radius: 6px 6px 0 0;">
  <h1 style="box-sizing: border-box; color: #131313; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">You received a message from :</h1>
  <p style="box-sizing: border-box; margin: 0rem;">
    <small style="box-sizing: border-box; color: #131313;"> Name: {{ $data['name']}} </small>
  </p> 
  <p style="box-sizing: border-box; margin: 0rem;">
    <small style="box-sizing: border-box; color: #131313;"> Email: {{ $data['user_message']}} </small>
  </p> 
</div> 
<div style="box-sizing: border-box; background-color: #fcfcfc; color: #131313; padding: .618rem 1rem 1.618rem; border-radius: 0;">
  <div style="box-sizing: border-box; display:block; max-width:100%; margin:0 auto;">
    <h4 style="box-sizing: border-box;">message is:</h4> 
    <p style="box-sizing: border-box;">
      <small style="box-sizing: border-box; color: #131313;"> Name: {{ $data['name']}} </small>
    </p> 
  </div>
  <div style="box-sizing: border-box;display:block; width:100%;">
    <div style="box-sizing: border-box; display:block; max-width:200px; margin: 2rem auto 0;">
      <a href="{{route('contactus.lists')}}"
          style="box-sizing: border-box;display:block;
          width:100%;
          margin-bottom: calc(1.618rem - 1px);
          background-color: #00d1b2;
          border-color: #00d1b2;
          border-width: 1px;
          color:  #fff;
          cursor: pointer; 
          padding-bottom: calc(0.61rem - 1px); 
          padding-top: calc(0.61rem - 1px);
          text-align: center;
          text-decoration:none;
          white-space: nowrap;
          padding-left: 2.618rem;
          padding-right: 2.618rem;
          border-radius: 1.618rem;
          box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);">view</a>
    </div>
  </div> 
</div>
<div style="box-sizing: border-box;background-color: #f5f5f5;color: #131313;padding: 1rem; border-radius: 0 0 6px 6px ;"> 
  <span style="box-sizing: border-box; color: #131313;">Thanks,</span><br>
  <span style="box-sizing: border-box; color: #131313;">{{ config('app.name') }}</span>
</div>
@endcomponent  

