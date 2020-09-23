@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

{{-- Scroll --}}
{{-- <div class="topScrollDiv">
    <marquee style="font-size: 15px; font-weight: 600; color: #FFFFFF; font-family: sans-serif; display: inline">
        @foreach ($featureNews as $news)
            <span onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                {{ "  " }} {{ $news->title }} || {{ "  " }}
            </span>
        @endforeach
    </marquee>
</div> --}}
<div class="container">
   <div class="row">
    <div class="braking headline">
        <span>শিরোনাম</span>
        <marquee behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
           <ul><!--bof Caching-->
            @foreach ($featureNews as $news)
            {{-- <span onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                {{ "  " }} {{ $news->title }} || {{ "  " }}
            </span> --}}
            <li><a href="{{ route('single-article',  $news->slug) }}" title=""><i class="fas fa-newspaper" aria-hidden="true"></i> {{ $news->title }}</a></li>
            @endforeach
    
            <!--/eof Caching-->
        </ul>
        </marquee>
      </div>
   </div>
</div>
{{-- End Scroll --}}

<section id="mainWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                @if($topNews != null)
                <div class="fullBannerBg" onclick="location.href='{{ route('single-article',  $topNews->slug) }}'">
                    <div class="fullBanner">
                        <img src="{{ asset('public/assets/images/posts/' . $topNews->featured_image) }}" alt="news_image">
                    </div>
                    <div class="fullbannerDetails">
                        <h2>{!! $topNews->title !!}</h2>
                        <p>{!! $topNews->short_description !!}</p>
                        <a href="{{ route('single-article',  $topNews->slug) }}"> Featured </a>
                    </div>
                </div>
                @endif

                <div class="gridBanner">

                    @foreach ($featureNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image" style="margin-bottom: 5px">
                            <h3>{{ $news->short_description }}</h3>
                        </div>
                    @endforeach

                    {{-- <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div> --}}

                  

                </div>

            </div>

            <div class="col-lg-4">

                <!-- Hadith Start -->
                @include('frontend.widgets.hadiths.index')
                <!-- Hadith End -->

                <!-- Namaz Start -->
                @include('frontend.widgets.namaz.index')
                <!-- Namaz End -->

                <!-- Update Start -->
                @include('frontend.widgets.updates.index')
                <!-- Update End -->

                {{-- For Temporary --}}
                <div class="rotin-img">
                    <!-- Leaflet Start -->
                    @include('frontend.widgets.leaflets.index')
                    <!-- Leaflet End -->
                </div>

                {{-- <div class="healthTips">
                    <h2> বিশ্বজুড়ে করোনাভাইরাস </h2>
                    <div class="healtipsDetails">
                        <img src="{{ asset('public/assets/frontend/img/cartoon.png') }}" alt="">
                        <h3>করোনাভাইরাস রোগ (সিওভিড -১৯) একটি সংক্রামক রোগ যা সদ্য আবিষ্কৃত করোন ভাইরাস দ্বারা সৃষ্ট।</h3>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>
</section>

<section id="bangladesh">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>বাংলাদেশ</h2>
                </div>
                <div class="enternaimentNews owl-carousel">
                    @foreach ($bangladeshNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h3>{{ $news->short_description }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<section id="entertainment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>বিনোদন</h2>
                </div>
                <div class="enternaimentNews owl-carousel">
                    @foreach ($entertainmentNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h3>{{ $news->short_description }}</h3>
                        </div>
                    @endforeach
                    {{-- <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Data Area Start -->
 {{-- @include('frontend.layouts.partials.data-area') --}}
<!-- Data Area End -->

<section id="mainWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="section-title">
                    <h2>খেলা</h2>
                </div>
                <div class="gridBanner">

                    @foreach ($sportsNews as $news)
                        <div class="singleGridBanner" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <img src="{{ asset('public/assets/images/posts/' . $news->featured_image) }}" alt="news_image">
                            <h4>{{ $news->short_description }}</h4>
                            <a href="{{ route('single-article',  $news->slug) }}"> বিস্তারিত </a>
                        </div>
                    @endforeach

                    {{-- <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h4>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h4>
                        <a href=""> লেখার মাঝেই </a>
                    </div> --}}

                </div>

                <div class="cityBanner">
                    <!-- Advertise Start -->
                    @include('frontend.widgets.advertises.index')
                    <!-- Advertise End -->
                </div>

            </div>

            <div class="col-lg-4">
                <div class="rotin">
                    <!-- Leaflet Start -->
                    {{-- @include('frontend.widgets.leaflets.index') --}}
                    <!-- Leaflet End -->
                </div>    
            </div>

        </div>
    </div>
</section>


<section id="mycity">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2> আমাদের নওয়াপাড়া </h2>
                </div>
                <div class="enternaimentNews owl-carousel">
                    @foreach ($noaparaNews as $news)
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


{{-- <section id="newsCatagoryList" class="bp">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2>অর্থনীতি</h2>

                    @foreach ($economicNews as $news)
                        <div class="catagoryWidgetList" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <p>{!! $news->title !!}</p>
                        </div>
                    @endforeach 

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> জীবনযাপন </h2>

                    @foreach ($lifeNews as $news)
                        <div class="catagoryWidgetList" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <p>{!! $news->title !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> বিজ্ঞান ও প্রযুক্তি </h2>

                    @foreach ($scienceNews as $news)
                        <div class="catagoryWidgetList" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <p>{!! $news->title !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> বাংলাদেশ </h2>

                    @foreach ($bangladeshNews as $news)
                        <div class="catagoryWidgetList" onclick="location.href='{{ route('single-article',  $news->slug) }}'">
                            <p>{!! $news->title !!}</p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section> --}}

@endsection