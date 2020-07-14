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
                        <img src="{{ asset('public/assets/frontend/img/banner-1.png') }}" alt="">
                    </div>
                    <div class="fullbannerDetails"> 
                        <a href=""> Featured </a>
                    </div>
                </div> 

                <div class="single-content">
                    <h2>পুরান ঢাকার পুরান চেহারা</h2>
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
                    <p>রাজধানীর ইউনাইটেড হাসপাতালে আগুনে মৃত ৫ জনের মধ্যে ৩ জন করোনাভাইরাস আক্রান্ত রোগী ছিলেন। মৃতদের সবাই লাইফসাপোর্টে ছিলেন। বুধবার রাতে হাসপাতাল কর্তৃপক্ষ এক সংবাদ বিজ্ঞপ্তিতে এই তথ্য জানায়। সংবাদ বিজ্ঞপ্তিতে বলা হয় রাত প্রায় ১০টার কিছু আগে লাগা আগুনে ৫ জনের মৃত্যু হয়। মৃতদের মধ্যে চারজন পুরুষ ও একজন নারী ছিলেন। মৃতরা হলেন রিয়াজুল আলম (৪৫), খোদেজা বেগম (৭০), ভেরুন এন্থনি পল (৭৪), মো. মনির হোসেন (৭৫), মো. মাহাবুব (৫০)। সংবাদ বিজ্ঞপ্তিতে আরও বলা হয়, হাসপাতালের মূল ভবনের বাইরে আইসোলেশন ইউনিটে আগুন লাগে ওই সময় আবহাওয়া খারাপ থাকায় আগুন দ্রুত ছড়িয়ে পড়ে। দুর্ভাগ্যজনকভাবে মৃত ওই পাঁচজনকে নিরাপদে বাইরে বের করে আনা সম্ভব হয়নি। এই ঘটনায় ইউনাইটেড হাসপাতাল দুঃখ প্রকাশ করেছে। এর আগে, বুধবার রাত ১০টার দিকে এসি বিস্ফোরণের পর অগ্নিকাণ্ডে ওই হতাহতের ঘটনা ঘটে বলে ধারণা করা হয়। ফায়ার সার্ভিস পরিচালক (অপারেশন ও মেইনটেন্যান্স) লেফটেন্যান্ট কর্নেল জিল্লুর রহমান প্রথম আলোকে বলেন, আগুনের খবর পেয়ে তাঁদের তিনটি ইউনিট হাসপাতালে যায়। মূল ভবনের বাইরে আলাদা জরুরি বিভাগে আগুন লাগে। ঘটনাস্থল থেকে পাঁচজনের লাশ উদ্ধার করা হয়েছে। ফায়ার সার্ভিস সদর দপ্তরের কর্তব্যরত কর্মকর্তা কামরুল ইসলাম বলেন, নিচতলায় এসি বিস্ফোরণের পর আগুন লাগে। যোগাযোগ করা হলে ফায়ার সার্ভিসের নিয়ন্ত্রণকক্ষ থেকে জানানো হয়, রাত ৯টা ৫৫ মিনিটের দিকে ওই আগুন লাগে। খবর পেয়ে ফায়ার সার্ভিসের তিনটি ইউনিট ঘটনাস্থলে যায়। রাত সাড়ে ১০টার দিকে আগুন নিয়ন্ত্রণে আনা সম্ভব হয়।</p>
                </div>

                <div class="add-image">
                    <!-- Advertise Start -->
                    @include('frontend.widgets.advertises.index')
                    <!-- Advertise End -->
                </div> 

                <div class="single-tags">
                    <h3>tags</h3>
                    <ul>
                        <li><a href="#">ঢাকা</a></li>
                        <li><a href="#">ইউনাইটেড হাসপাতালে</a></li>
                        <li><a href="#">করোনাভাইরাস</a></li>
                        <li><a href="#">আগুনে মৃত</a></li>
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