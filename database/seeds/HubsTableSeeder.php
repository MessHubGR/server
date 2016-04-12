<?php

use Illuminate\Database\Seeder;
use App\Hub;

class HubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Hub::create([
    		"key" => 'KQ7f81ER5VMYPgCVALPRP03M2eXfJYZ0',
			"latitude" => 38.147819,
			"longitude" => 23.490875,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => 'fR1f1mv0fqg7GAi3K4GEtPPP7y1MdPN0',
			"latitude" => 38.245503,
			"longitude" => 23.331620,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => '8kxJG357cBcMbrYM085m16PrR93aj9hA',
			"latitude" => 38.288198,
			"longitude" => 23.046128,
			"capacity" => 10,
			"active" => true
    	]);

    	Hub::create([
    		"key" => '0e21Gw7319pr2Pq2WngRVLKIKmjyUSF1',
			"latitude" => 38.513456,
			"longitude" => 23.065549,
			"capacity" => 10,
			"active" => true
    	]);
    }
}
