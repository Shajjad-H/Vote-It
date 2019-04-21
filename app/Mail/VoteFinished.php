<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Votes;

class VoteFinished extends Mailable
{
    
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $vote;
    private $for, $against, $indifferent, $voted, $total;

    public function __construct(Votes $vote, int $for, int $against, int $indifferent, int $voted, int $total)
    {
        $this->vote = $vote;
        $this->for = $for;
        $this->against = $against;
        $this->indifferent = $indifferent;
        $this->voted = $voted;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail')
        ->with([
            'vote' => $this->vote,
            'for' => $this->for,
            'against' => $this->against,
            'indifferent' => $this->indifferent,
            'voted' => $this->voted,
            'total' => $this->total
        ]);
    }
}
