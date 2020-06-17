<?php

use App\Models\PollResponse;
use Illuminate\Database\Seeder;

class PollResponseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pollResponse = new PollResponse();
        $pollResponse->type = "yes";
        $pollResponse->poll_id = 1;
        $pollResponse->ip_address = "192.168.10.10";
        $pollResponse->save();

        $pollResponse = new PollResponse();
        $pollResponse->type = "no";
        $pollResponse->poll_id = 1;
        $pollResponse->ip_address = "192.168.10.10";
        $pollResponse->save();
    }
}
