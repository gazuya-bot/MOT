<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'members_id' => '2',
            'is_delete' => 'active',
            'sale' => '1000',
            'pay_point' => '0',
            'get_point' => '10',
            'total_point' => '10',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);

        $param = [
            'members_id' => '3',
            'is_delete' => 'active',
            'sale' => '1500',
            'pay_point' => '0',
            'get_point' => '15',
            'total_point' => '25',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);

        $param = [
            'members_id' => '4',
            'is_delete' => 'active',
            'sale' => '5000',
            'pay_point' => '0',
            'get_point' => '50',
            'total_point' => '50',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);

        $param = [
            'members_id' => '5',
            'is_delete' => 'active',
            'sale' => '2500',
            'pay_point' => '0',
            'get_point' => '25',
            'total_point' => '75',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);

        $param = [
            'members_id' => '6',
            'is_delete' => 'active',
            'sale' => '3000',
            'pay_point' => '0',
            'get_point' => '30',
            'total_point' => '30',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);

        $param = [
            'members_id' => '7',
            'is_delete' => 'active',
            'sale' => '1900',
            'pay_point' => '0',
            'get_point' => '19',
            'total_point' => '49',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        DB::table('points')->insert($param);
    }
}
