<?php

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slider = new Slider();
        $slider->title = "This is a simple slider from admin panel";
        $slider->slug = "this-is-a-simple-slider-from-admin-panel";
        $slider->short_description = "<div>Welcome to our slider <br /></div>";
        $slider->save();

        $slider = new Slider();
        $slider->title = "This is another slider from admin panel";
        $slider->slug = "this-is-another-slider-from-admin-panel";
        $slider->short_description = "<div>Welcome to our slider <br /></div>";
        $slider->save();
    }
}
