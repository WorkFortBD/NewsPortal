@php
    // setlocale(LC_TIME, 'BD');
    // $dt = \Carbon\Carbon::now();
    // $time = $dt->formatLocalized('%A %d %B %Y');  

    $time1 = App\Helpers\Dates\DateHelper::getBanglaDate();
    $time2 = App\Helpers\Dates\DateHelper::getArabicDate();

@endphp
<!-- Data Area Start -->
<section class="dateArea">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="today">
                  <p>
                    {{ $time1 }},
                     {{ $time2 }}
                    </p>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Data Area End -->
