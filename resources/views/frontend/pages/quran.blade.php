@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<div class="page-bg-image">
    <img src="{{ asset('public/assets/frontend/img/page-bg.png') }}" alt="">
</div>

<section id="mainWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="page-title">
                    <h1>কোরআন ও হাদিস</h1>
                    <ul>
                        <li><a href="{{ route('index') }}">হোম</a></li>
                        <li><a href="{{ route('quran-hadith') }}">কোরআন ও হাদিস</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">


                <div class="gridBanner mt-0">

                    @foreach ($quranNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h4>{{ $news->title }}</h4>
                            {{-- <a href="{{ route('single-article',  $news->slug) }}" class="date">{{ $news->created_at->toFormattedDateString() }}</a> --}}
                        </div>
                    @endforeach 

                    {{-- <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div> --}}

                    <div class="section-title">
                        <h2>শিক্ষা ও সংস্কৃতি</h2>
                    </div>

                    @foreach ($educationNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h4>{{ $news->title }}</h4>
                            <div class="singleGridBanner-border"></div>
                        </div>
                    @endforeach 

                    {{-- <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div> --}}
                   
                    <div class="add-image">
                        <!-- Advertise Start -->
                        @include('frontend.widgets.advertises.index')
                        <!-- Advertise End -->
                    </div>

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

                <div class="rotin-img">
                    <!-- Leaflet Start -->
                    @include('frontend.widgets.leaflets.index')
                    <!-- Leaflet End -->
                </div>

            </div>

        </div>
    </div>
</section>



<section id="mycity" class="sb-khbr">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2> বাংলাদেশের সব খবর </h2>
                </div>

                @foreach ($bangladeshNews as $news)
                    <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                        <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                        <h5>{{ $news->title }}</h5>
                    </div>
                @endforeach 

                {{-- <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> --}}

            </div>
        </div>
    </div>
</section>

@endsection