<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class shorturlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shorturls')->insert([
            [
                'short_url' => 'short-url-1',
                'short_origin' => 'https://localhost/origin-url-1',
                'user_id' => 1, // กำหนด user_id ที่ต้องการ
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'short_url' => 'short-url-2',
                'short_origin' => 'https://localhost/origin-url-2',
                'user_id' => 1, // กำหนด user_id ที่ต้องการ
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // เพิ่มข้อมูลอื่น ๆ ตามต้องการ
        ]);
    }
}
