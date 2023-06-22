<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use App\Models\CovidData;

class UpdateCovidData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-covid-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update data table from the API of HPB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://hpb.health.gov.lk/api/get-current-statistical');
        $data = $response->json()['data'];

        $covidData = new CovidData();
        $covidData->updateOrInsert(['update_date_time' => $data['update_date_time'],], 
        [
            'local_new_cases' => $data['local_new_cases'],
            'local_total_cases' => $data['local_total_cases'],
            'local_total_number_of_individuals_in_hospitals' => $data['local_total_number_of_individuals_in_hospitals'],
            'local_deaths' => $data['local_deaths'],
            'local_recovered' => $data['local_recovered'],
            'global_new_cases' => $data['global_new_cases'],
            'global_total_cases' => $data['global_total_cases'],
            'global_deaths' => $data['global_deaths'],
            'global_recovered' => $data['global_recovered'],
        ]);

        $this->info('Data table updated successfully!');
    }
}
