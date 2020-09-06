@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('social_meta_tags')

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ 'http://www.akijeralo.com/news/' .  $singleNews->slug}}">
<meta property="og:title" content="{{ $singleNews->title }}">
<meta property="og:description" content="{{ $singleNews->description }}">
<meta property="og:image" content="{{ asset('public/assets/images/posts/' . $singleNews->featured_image) }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ 'http://www.akijeralo.com/news/' .  $singleNews->slug}}">
<meta property="twitter:title" content="{{ $singleNews->title }}">
<meta property="twitter:description" content="{{ $singleNews->description }}">
<meta property="twitter:image" content="{{ asset('public/assets/images/posts/' . $singleNews->featured_image) }}">

@endsection

@section('main-content')

<section id="mainWrapper" class="single-wrapper">
    <div class="container">
        <div class="row"> 

            <div class="col-lg-8">
                
                @if($singleNews->featured_image != null)
                <div class="fullBannerBg">
                    <div class="fullBanner">
                        <img src="{{ asset('public/assets/images/posts/' . $singleNews->featured_image) }}" alt="news_image">
                    </div>
                    <div class="fullbannerDetails"> 
                        <a href=""> Featured </a>
                    </div>
                </div>
                @endif 

                <div class="single-content">
                    <h2 style="margin-top: {{ $singleNews->featured_image === null ? '50px' : '0px' }}">{{ $singleNews->title }}</h2>
                    <div class="protibedon">
                        <a href="#">নিজস্ব প্রতিবেদক, যশোর</a>
                        {{-- <span>২৮ মে ২০২০, ০১:২৭</span> --}}
                        @php
                            $time1 = App\Helpers\Dates\DateHelper::getBanglaDate();
                            $time2 = App\Helpers\Dates\DateHelper::getArabicDate();
                        @endphp
                        <span>
                            {{ $time1 }},
                            {{ $time2 }}
                        </span>
                    </div>
                    <div class="single-socle">
                        <a href="https://www.facebook.com/akijeralo/", target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.youtube.com/channel/UC9Vj1XTycjptY4Pc0cfJ4ew?view_as=subscriber", target="_blank"><i class="fab fa-youtube"></i></a>
                        {{-- <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-viber"></i></a> --}}
                    </div>
                    <p>{!! $singleNews->description !!}</p>
                </div>

                <div class="add-image">
                    <!-- Advertise Start -->
                    @include('frontend.widgets.advertises.index')
                    <!-- Advertise End -->
                </div> 

                <div class="single-tags">
                    <h3>tagszzzzz</h3>
                    <ul>
                        @foreach ($singleNews->tags as $item)
                        <li><a href="#">{{ $item->tag->title }}</a></li>
                        @endforeach
                        {{-- <li><a href="#">ঢাকা</a></li>
                        <li><a href="#">ইউনাইটেড হাসপাতালে</a></li>
                        <li><a href="#">করোনাভাইরাস</a></li>
                        <li><a href="#">আগুনে মৃত</a></li> --}}
                    </ul>
                </div>

                <div class="single-socle">
                    <a href="https://www.facebook.com/akijeralo/", target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com/channel/UC9Vj1XTycjptY4Pc0cfJ4ew?view_as=subscriber", target="_blank"><i class="fab fa-youtube"></i></a>
                    {{-- <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-viber"></i></a> --}}
                </div>
                
                <div class="single-tok">
                    <h3>মন্তব্য</h3>
                    <p>মন্তব্য করতে <a href="#">লগইন করুন অথবা নিবন্ধন করুন</a></p>
                </div>

            </div>

            <div class="col-lg-4">

                {{-- Online Vote Section --}}
                {{-- @include('frontend.widgets.polls.index') --}}
                {{-- End of Online Vote Section --}}

                <!-- Hadith Start -->
                @include('frontend.widgets.hadiths.index')
                <!-- Hadith End -->

                <!-- Namaz Start -->
                @include('frontend.widgets.namaz.index')
                <!-- Namaz End -->

                <!-- Update Start -->
                @include('frontend.widgets.updates.index')
                <!-- Update End --> 
                

            </div>

        </div>
    </div>
</section>


<section id="mycity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2> সব খবর </h2>
                </div>
                <div class="enternaimentNews owl-carousel">

                    @foreach ($allNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h5>{{ $news->title }}</h5>
                        </div>
                    @endforeach 
                 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection