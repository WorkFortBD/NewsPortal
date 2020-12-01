{{-- <div class="HadithBox NamazBox">
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
</div> --}}

@php
    $districts = App\Models\District::select('districts.id','districts.district_name')->get();
    // dd($prayers);
@endphp

<div class="HadithBox NamazBox">
    <h2>নামাজের সময়সূচী 
        <div class="dropdown float-right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Select District
            </button>
            <div class="dropdown-menu">
            @foreach ($districts as $district)
               
                <button class="dropdown-item" id="#showPrayerList{{ $district->id }}">{{$district->district_name}}</button>

            @endforeach
              {{-- <a class="dropdown-item" href="#">Link 1</a>
              <a class="dropdown-item" href="#">Link 2</a>
              <a class="dropdown-item" href="#">Link 3</a> --}}
            </div>
          </div>
    </h2>
    {{-- @php
        $reutersNews = App\Models\Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Reuters')
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'desc')
            ->limit(3)
            ->get();
    @endphp

    @foreach ($reutersNews as $news)
        <div onclick="location.href='{{ route('single-article',  $news->slug) }}'">
            <p><a href="#" style="font-size: 0.9rem">{{ $news->short_description }}</a></p>
        </div>
    @endforeach --}}

    <div class="namazList">
        <table>

            <thead>
                <tr>
                    <th>নামাজের নাম</th>
                    <th>নামাজের সময়</th>
                </tr>
            </thead>
            <tbody id="">

                {{-- @foreach ($prayers as $prayer)
                    <tr>
                        <td>{{$prayer->prayer_name_bn}}</td>
                        <td>{{$prayer->prayer_time_bn}}</td>
                    </tr>
                @endforeach --}}
            </tbody>
            
        </table>
    </div>
</div>