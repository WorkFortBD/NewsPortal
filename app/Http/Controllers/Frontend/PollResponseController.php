<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PollResponse;
use App\Models\Poll;

class PollResponseController extends Controller
{
    public function storePoll(Request $request, $id){
        $storePoll = new PollResponse();
        $storePoll->poll_id = $id;
        $storePoll->ip_address = $request->ip();
        $storePoll->type = $request->radio;
        $storePoll->save();

        $poll = Poll::find($id);

        $total_yes = PollResponse::where('type', 'yes')->count();

        $total_no = PollResponse::where('type', 'no')->count();

        $poll->total_yes = $total_yes;

        $poll->total_no = $total_no;

        $poll->save();

        // Select count(*) FROM PollResponse Where type = "male"
        
        return ['success'=>true,'message'=>'successfully voted'];

    }
}
