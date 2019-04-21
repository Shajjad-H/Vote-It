<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Votes;
use App\Providers\CasServiceProvider as Cas;


class MailController extends Controller
{
    static public function sendIf(Votes $vote, int $percentage)
    {

        if($vote->send_mail != 0)
            return;

        $for = $vote->for();
        $against = $vote->against();
        $indifferent = $vote->indifferent();
        $voted = $for + $against + $indifferent;
        $total = $vote->total() == 0 ? 1 : $vote->total() ;

        if($voted/$total*100 < $percentage)
            return;

        $mails = $vote->users->map(function ($user){
            return $user->email;
        })->all();


        Mail::to($mails)
            ->queue(new \App\Mail\VoteFinished($vote, $for, $against, $indifferent, $voted, $total ));
        $vote->send_mail = true;
        $vote->save();
    }
}
