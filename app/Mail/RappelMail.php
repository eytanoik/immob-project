<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;



class RappelMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $offre_click;
 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct ($offre_click)
    {
        $this->offre_click = $offre_click;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('immob@mydev.io')
        ->subject('Offre a pas rater!')
        ->markdown('mails.rappel')->with('offre_click', $this->offre_click);
    }
}
