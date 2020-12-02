

@php
    $poll = App\Models\Poll::where('status', '=', 1)->latest()->take(1)->first();
    $yesVote = $poll->total_yes;
    $noVote = $poll->total_no;
    $totalVote = $yesVote+$noVote;
@endphp

<div class="online-vut">
    <h2>অনলাইন ভোট</h2>
    <p>{{ $poll->title }}</p>
    <form method="POST" id="contactForm" >
        {{-- @method('POST')
        @csrf --}}
        <label class="check-container">হ্যাঁ
            <input type="radio" name="radio" value="yes">
            <span class="checkmark"></span>
        </label>
        <label class="check-container">না
            <input type="radio" name="radio" value="no">
            <span class="checkmark"></span>
        </label>
        <button type="submit" class="submit-vut">ভোট দিন</button>
        <div class="total-vut">ভোট দিয়েছেন {{ $totalVote }} জন</div>
    </form>
</div>

{{-- action="{{ route('storePoll', $poll->id) }}" --}}