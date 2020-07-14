<?php

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = new Document();
        $document->title = "This is a Document from admin panel";
        $document->file = "public/assets/images/admins/superadmin.jpg";
        $document->type = "image";
        $document->link_type = 'local';
        $document->extension = 'jpg';
        $document->save();

        $document = new Document();
        $document->title = "This is a Document from admin panel";
        $document->file = "public/assets/images/admins/superadmin.jpg";
        $document->type = "image";
        $document->link_type = 'local';
        $document->extension = 'jpg';
        $document->save();
    }
}
