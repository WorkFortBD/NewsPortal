<!-- Plugins JS File -->
<script src="{{ asset('public/assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/carousel.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('public/assets/frontend/js/custom.js') }}"></script>

<script>
    @php
        $poll = App\Models\Poll::where('status', '=', 1)->latest()->take(1)->first();
    @endphp

    $(function(){
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('#contactForm').submit(function(e){
            e.preventDefault();
            var data = $(this).serialize();
            var url = '{{ route('storePoll', $poll->id) }}';
            // console.log(data);
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response){
                    if(response.success){
                        alert(response.message);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });
</script>