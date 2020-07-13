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
                    <h1>আন্তর্জাতিক</h1>
                    <ul>
                        <li><a href="{{ route('index') }}">হোম</a></li>
                        <li><a href="{{ route('international') }}">আন্তর্জাতিক</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">


                <div class="gridBanner mt-0">

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>ইউনাইটেড হাসপাতালে আগুনে মৃতদের মধ্যে তিনজন করোনারোগী</h4>
                        <a href="#" class="date">24 June</a>
                    </div>

                    <div class="section-title">
                        <h2>বিনোদন</h2>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>
                    
                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>

                    <div class="singleGridBanner">
                        <img src="{{ asset('public/assets/frontend/img/gridBanner1.png') }}" alt="">
                        <h4>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h4> 
                        <div class="singleGridBanner-border"></div>
                    </div>
                   
                    <div class="add-image">
                        <img src="{{ asset('public/assets/frontend/img/add-img.png') }}" alt="">
                    </div>

                </div>

                

            </div>

            <div class="col-lg-4">
                {{-- Online Vote Section --}}
                @include('frontend.pages.partials.online-vote')
                {{-- End of Online Vote Section --}}

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

                <div class="rotin-img">
                    <img src="{{ asset('public/assets/frontend/img/rotin.png') }}" alt="">
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

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

                <div class="singleGridBanner">
                    <img src="{{ asset('public/assets/frontend/img/khobor.png') }}" alt="">
                    <h5>লকডাউনে ঘরে বসে যা শিখছেন তাঁরা</h5>
                </div> 

            </div>
        </div>
    </div>
</section>

@endsection