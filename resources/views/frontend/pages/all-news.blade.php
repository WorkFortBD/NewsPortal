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
                    <h1>অন্যান্য</h1>
                    <ul>
                        <li><a href="{{ route('index') }}">হোম</a></li>
                        <li><a href="{{ route('all-news') }}">অন্যান্য</a></li>
                    </ul>
                </div>
            </div>

            {{-- <div class="col-lg-7 m-4">
                <form action="{{ route('category-news') }}" method="POST" enctype="multipart/form-data"
                    data-parsley-validate data-parsley-focus="first">
                    @csrf
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">News Filter</label>
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="category">
                      <option selected>Choose Category</option>
                      <option value="Bangladesh">বাংলাদেশ</option>
                      <option value="International">আন্তর্জাতিক</option>
                      <option value="Economic">অর্থনীতি</option>
                      <option value="Education">শিক্ষা ও সংস্কৃতি</option>
                      <option value="Quran Hadith">কোরআন ও হাদিস</option>
                      <option value="Sports">খেলা</option>
                      <option value="Fashion">বিনোদন</option>
                      <option value="Noapara">আকিজ সিটি</option>
                    </select>
                  
                    <button type="submit" class="btn btn-primary my-1">Submit</button>
                </form>
            </div> --}}

            <div class="col-lg-8">


                <div class="gridBanner mt-0">

                    @foreach ($allNews as $news)
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
                        <h2>বিনোদন</h2>
                    </div>

                    @foreach ($entertainmentNews as $news)
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