<!-- Navigation Area Start -->
<section id="navigationArea">
  <div class="container">
      <div class="row">

          <div class="col-lg-3 nav-col">
              <div class="logo-top">
                  <a href="{{ route('index') }}" class="logoHere">
                      <img src="{{ asset('public/assets/frontend/img/logo.png') }}" alt="Logo">
                  </a>
              </div> 
          </div>
          <div class="col-lg-9 nav-col">
              <div class="navigationMenu">
                  <ul>
                      <li> <a href="{{ route('bangladesh') }}"> বাংলাদেশ </a> </li>
                      <li> <a href="{{ route('international') }}"> আন্তর্জাতিক </a> </li>
                      <li> <a href="{{ route('economic') }}"> অর্থনীতি </a> </li>
                      <li> <a href="#"> মতামত </a> </li>
                      <li> <a href="{{ route('sports') }}">খেলা </a> </li>
                      <li> <a href="{{ route('entertainment') }}"> বিনোদন </a> </li>
                      <li> <a href="{{ route('akij-city') }}"> আকিজ সিটি </a> </li>
                      <li> <a href="{{ route('all-news') }}"> সব </a> </li> 
                      {{-- <li> <a href="{{ route('admin.login') }}"> লগইন </a> </li> --}}
                      
                  </ul>
              </div>
          </div>

      </div>
  </div>
</section>
<!-- Navigation Area End -->
