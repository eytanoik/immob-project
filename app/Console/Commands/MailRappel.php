<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Offre;
use App\Demande;
use App\User;
use App\OffreClick;
use Illuminate\Support\Facades\Mail;
use App\Mail\RappelMail;

class MailRappel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mailRappel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time = Carbon::now()->add('-1', 'day')->toDateTimeString();

        $offre_click = OffreClick::whereDate('created_at', '>', $time)
            ->where('count', '>=', 2)->get();

          
            if(isset($offre_click)) {

                foreach ($offre_click as $offre_click) {
                    Mail::to($offre_click->user->email)->send(new RappelMail($offre_click));
                }
            }
    }
}
