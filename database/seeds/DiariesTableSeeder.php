<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $diaries = [
            [
                'title' =>'セブでプログラミング',
                'body' =>'気づけばもうすぐ２ヶ月',
            ],
            [
                'title' =>'週末は旅行',
                'body' =>'オスロ部に言ってジンベイザメと泳ぎました。',
            ],
            [
                'title' =>'英語授業',
                'body' =>'死にたい笑',
            ],
            
        ];
        foreach($diaries as $diary){

            DB::table('diaries')->insert([
                'title' => $diary['title'],
                'body' => $diary['body'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
