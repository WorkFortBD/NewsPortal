<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PollTableSeeder::class);
        $this->call(PollResponseTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostCommentTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
    }
}
