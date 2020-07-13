@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<section id="mainWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <div class="fullBannerBg">
                    <div class="fullBanner">
                        <img src="{{ asset('public/assets/frontend/img/banner-1.png') }}" alt="">
                    </div>
                    <div class="fullbannerDetails">
                        <h2>অর্থহীন লেখা</h2>
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা অর্থবোধকতা তৈরি করে, যখন তুমি তাতে অর্থ ঢালো। যেকোনো লেখাই তোমার কাছে অর্থবোধকতা তৈরি করতে পারে, যদি তুমি সেখানে অর্থদ্যোতনা দেখতে পাও। …ছিদ্রান্বেষণ? না, তা হবে কেন?</p>
                        <a href=""> Featured </a>
                    </div>
                </div>

                <div class="gridBanner">

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

                  

                </div>

            </div>

            <div class="col-lg-4">

                <div class="HadithBox">
                    <h2>অর্থহীন লেখা যার</h2>
                    <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    <h3> অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। </h3>
                </div>

                <div class="HadithBox NamazBox">
                    <h2>অর্থহীন লেখা যার</h2>
                     <div class="namazList">
                         <table>
                             <tr>
                                 <td>অর্থহীন</td>
                                 <td> : </td>
                                 <td>অর্থহীন</td>
                             </tr>

                             <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>

                            <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>
                            <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>
                            <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>
                            <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>

                            <tr>
                                <td>অর্থহীন</td>
                                <td> : </td>
                                <td>অর্থহীন</td>
                            </tr>
                             
                         </table>
                     </div>
                </div>
                <div class="coronoUpdate">
                    <h2>বিশ্বজুড়ে করোনাভাইরাস</h2>
                    <div class="corona">

                        <div class="status">
                            <h3>বাংলাদেশে</h3>
                            <div class="statusBox">
                                <h4>আক্রান্ত</h4>
                                <h5>৩৮২৯২</h5>
                            </div>
                            <div class="statusBox">
                                <h4>সুস্থ</h4>
                                <h5>৭৯২৫</h5>
                            </div>
                            <div class="statusBox">
                                <h4>সুস্থ</h4>
                                <h5>৫৪৪</h5>
                            </div> 
                        </div>

                        <div class="status">
                            <h3>বাংলাদেশে</h3>
                            <div class="statusBox">
                                <h4>আক্রান্ত</h4>
                                <h5>৩৮২৯২</h5>
                            </div>
                            <div class="statusBox">
                                <h4>সুস্থ</h4>
                                <h5>৭৯২৫</h5>
                            </div>
                            <div class="statusBox">
                                <h4>সুস্থ</h4>
                                <h5>৫৪৪</h5>
                            </div> 
                        </div>

                    </div>
                </div>

                <div class="healthTips">
                    <h2> বিশ্বজুড়ে করোনাভাইরাস </h2>
                    <div class="healtipsDetails">
                        <img src="{{ asset('public/assets/frontend/img/cartoon.png') }}" alt="">
                        <h3>করোনাভাইরাস রোগ (সিওভিড -১৯) একটি সংক্রামক রোগ যা সদ্য আবিষ্কৃত করোন ভাইরাস দ্বারা সৃষ্ট।</h3>
                    </div>
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
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h3>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Data Area Start -->
 @include('frontend.layouts.partials.data-area')
<!-- Data Area End -->

<section id="mainWrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="section-title">
                    <h2>খেলা</h2>
                </div>
                <div class="gridBanner">

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

                </div>

                <div class="cityBanner">
                    <img src="{{ asset('public/assets/frontend/img/add-img.png') }}" alt="">
                </div>

            </div>

            <div class="col-lg-4">
                <div class="rotin">
                    <img src="{{ asset('public/assets/frontend/img/rotin.png') }}" alt="">
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

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner.png') }}" alt="">
                        <h5>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</h5>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</section>


<section id="newsCatagoryList" class="bp">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2>অর্থনীতি</h2>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> জীবনযাপন </h2>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> বিজ্ঞান ও প্রযুক্তি </h2>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-3">
                <div class="singleCatagoryWidget">
                    <h2> বাংলাদেশ </h2>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                    <div class="catagoryWidgetList">
                        <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection