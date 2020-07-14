<?php

use App\Models\Poll;
use Illuminate\Database\Seeder;

class PollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poll = new Poll();
        $poll->title = "This is a simple poll from admin panel";
        $poll->slug = "this-is-a-simple-poll-from-admin-panel";
        $poll->status = 1;
        $poll->start_date = "2020-06-14";
        $poll->end_date = "2020-06-15";
        $poll->total_yes = 5;
        $poll->total_no = 2;
        $poll->total_no_comment = 1;
        $poll->save();

        $poll = new Poll();
        $poll->title = "This is another poll from admin panel";
        $poll->slug = "this-is-another-poll-from-admin-panel";
        $poll->status = 0;
        $poll->start_date = "2020-06-15";
        $poll->end_date = "2020-06-16";
        $poll->total_yes = 7;
        $poll->total_no = 11;
        $poll->total_no_comment = 3;
        $poll->save();
    }
}
