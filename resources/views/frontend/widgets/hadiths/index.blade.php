{{-- <div class="HadithBox">
    <h2>অর্থহীন লেখা যার</h2>
    <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
    <h3> অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। </h3>
</div> --}}


{{-- <div class="HadithBox" onclick="location.href='https://www.aljazeera.com/'" target='_blank'>
    <h2>AL ZAJEERA</h2>
    <p>অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। হ্যাঁ, এই লেখার মাঝেই আছে</p>
    <h3> Breaking News </h3>
</div> --}}
<div class="HadithBox">
    <h2>AL ZAJEERA</h2>
    @php
        $alzajeeraNews = App\Models\Post::select('posts.id as id', 'posts.title as title', 'posts.slug as slug', 'posts.short_description as short_description', 'posts.description as description', 'posts.featured_image as featured_image', 'posts.featured_image_caption as featured_image_caption', 'posts.category_id as category_id', 'posts.status as status', 'c.name as name')
            ->join('categories as c', 'posts.category_id', 'c.id')
            ->where('c.name', 'Aljazeera')
            ->where('posts.status', 1)
            ->get();
    @endphp
    @foreach ($alzajeeraNews as $news)
        <div onclick="location.href='{{ route('single-article',  $news->slug) }}'">
            <p><i class="fas fa-newspaper"></i> <a href="#" style="font-size: 0.9rem">{{ $news->title }}</a></p>
        </div>
    @endforeach
</div>
