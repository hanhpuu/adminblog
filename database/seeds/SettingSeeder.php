<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultPosts = new Setting();
        $defaultPosts->key = 'Number of posts per page';
        $defaultPosts->value = '5';
        $defaultPosts->save();
        $defaultPics = new Setting();
        $defaultPics->key = 'Number of photo on carousel';
        $defaultPics->value = '3';
        $defaultPics->save();
        $defaultPics1 = new Setting();
        $defaultPics1->key = 'Photo';
        $defaultPics1->value = '';
        $defaultPics1->save();
        
    }
}
