@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<section id="mainWrapper" class="single-wrapper">
    <div class="container">
        <div class="row"> 

            <div class="col-lg-8">
                
                <div class="fullBannerBg">
                    <div class="fullBanner">
                        <img src="{{ asset('public/assets/images/posts/' . $singleNews->featured_image) }}" alt="news_image">
                    </div>
                    <div class="fullbannerDetails"> 
                        <a href=""> Featured </a>
                    </div>
                </div> 

                <div class="single-content">
                    <h2>{{ $singleNews->title }}</h2>
                    <div class="protibedon">
                        <a href="#">নিজস্ব প্রতিবেদক, ঢাকা</a>
                        <span>২৮ মে ২০২০, ০১:২৭</span>
                    </div>
                    <div class="single-socle">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-viber"></i></a>
                    </div>
                    <p>{!! $singleNews->description !!}</p>
                </div>

                <div class="add-image">
                    <!-- Advertise Start -->
                    @include('frontend.widgets.advertises.index')
                    <!-- Advertise End -->
                </div> 

                <div class="single-tags">
                    <h3>tags</h3>
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
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-viber"></i></a>
                </div>
                
                <div class="single-tok">
                    <h3>মন্তব্য</h3>
                    <p>মন্তব্য করতে <a href="#">লগইন করুন অথবা নিবন্ধন করুন</a></p>
                </div>

            </div>

            <div class="col-lg-4">

                {{-- Online Vote Section --}}
                @include('frontend.widgets.polls.index')
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

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h5>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h5>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection