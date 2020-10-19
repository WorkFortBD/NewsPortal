<?php

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscription = new Subscription();
        $subscription->user_id = 1;
        $subscription->email = "abc@test.com";
        $subscription->status = 0;
        $subscription->save();

        $subscription = new Subscription();
        $subscription->user_id = 1;
        $subscription->email = "xyz@test.com";
        $subscription->status = 1;
        $subscription->save();
    }
}
