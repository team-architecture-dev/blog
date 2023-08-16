<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
            ],
            [
                'name' => 'Türkçe',
                'code' => 'tr',
            ],
        ];

        foreach ( $languages as $languageData ) {
            $language = DB::table( 'languages' )->where( 'name', $languageData['name'] )->first();

            if ( ! $language ) {
                $languageData['created_at'] = Carbon::now();
                $languageData['updated_at'] = Carbon::now();
                DB::table( 'languages' )->insert( $languageData );
            }
        }
    }
}
