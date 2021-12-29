<?php

use Illuminate\Database\Seeder;

class Members_listsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'club_name' => '未登録',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);


        $param = [
            'club_name' => 'A学校',
            'email' => 'a@example.com',
            'address' => '大阪府',
            'name' => '大阪太郎',
            'tel' => '08065124587',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);

        $param = [
            'club_name' => 'B学校',
            'email' => 'b@example.com',
            'address' => '京都府',
            'name' => '京都花子',
            'tel' => '08048751236',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);

        $param = [
            'club_name' => 'C学校',
            'email' => 'c@example.com',
            'address' => '奈良県',
            'name' => '奈良剛志',
            'tel' => '08078542354',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);

        $param = [
            'club_name' => 'D学校',
            'email' => 'd@example.com',
            'address' => '奈良県',
            'name' => '兵庫美知恵',
            'tel' => '08054123658',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);

        $param = [
            'club_name' => 'E学校',
            'email' => 'e@example.com',
            'address' => '和歌山県',
            'name' => '和歌山桃子',
            'tel' => '08012358964',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);

        $param = [
            'club_name' => 'F学校',
            'email' => 'e@example.com',
            'address' => '愛媛県',
            'name' => '愛媛蜜柑',
            'tel' => '08045692354',
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('members_lists')->insert($param);


    }
}
