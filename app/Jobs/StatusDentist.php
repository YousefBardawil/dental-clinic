<?php

namespace App\Jobs;

use App\Models\Dentist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StatusDentist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dentists_ids;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dentists_ids)
    {
        $this->dentists_ids = $dentists_ids;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // $dentists_ids = Dentist::where('status',0)->pluck('id');

        $dentists_ids = $this->dentists_ids;
        foreach($dentists_ids as $ids){
            Dentist::where('id',$ids)->update([
                'status' => 0
            ]);
        }
    }
}
