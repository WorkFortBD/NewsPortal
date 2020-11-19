@php
    // setlocale(LC_TIME, 'BD');
    // $dt = \Carbon\Carbon::now();
    // $time = $dt->formatLocalized('%A %d %B %Y');  

    // $time1 = App\Helpers\Dates\DateHelper::getBanglaDate();
    // $time2 = App\Helpers\Dates\DateHelper::getArabicDate();
    
    $currentDate = date("l, F j, Y");
    
    $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
    'May','June','July','August','September','October','November','December','Saturday','Sunday',
    'Monday','Tuesday','Wednesday','Thursday','Friday');
    
    $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
    'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
    বুধবার','বৃহস্পতিবার','শুক্রবার' 
    );
    
    $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);

@endphp
<!-- Data Area Start -->
<section class="dateArea">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="today">
                  <p>
                    {{ $convertedDATE }}
                    {{--  {{ $time1 }},  --}}
                     {{--  {{ $time2 }}  --}}
                    </p>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Data Area End -->
