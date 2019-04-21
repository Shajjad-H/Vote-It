<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\URL;

use App\User;
use App\Groupe;
use App\Votes;
use App\VoteResult;

use App\Http\Controllers\MailController;

use App\Providers\CasServiceProvider as Cas;


class VotesController extends Controller
{
    protected $formBuilder;
    function __construct(FormBuilder $formBuilder) {
        $this->formBuilder = $formBuilder;
    }


    public function index(Request $request)
    {
        $user = Cas::user();
        return view('votes.index')->with('votes', $user->votes);
    }

    public function edit (Votes $vote)
    {
        return view('votes.edit')->with('form', $this->form($vote));
    }


    public function vote(Votes $vote, String $outcome)
    {
        $user = Cas::user();

        $voteResult = VoteResult::firstOrCreate([
             'vote_id' => $vote->id,
             'user_id' => $user->id
        ]);

        
        $voteResult->outcome = $outcome;
        $voteResult->save();
        
        MailController::sendIf($vote, 60);
        
        return redirect(URL::previous() . "#vote-id-$vote->id");
    }

    public function for(Votes $vote)
    {
        return $this->vote($vote, 'for');
    }

    public function against(Votes $vote)
    {
        return $this->vote($vote, '!for');

    }

    public function indifferent(Votes $vote)
    {
        return $this->vote($vote, 'meh');  
    }

    public function destroy(Votes $vote)
    {
        if($vote->user_id != Cas::user()->id)
        //if($vote->user_id != Cas::user()->id && !Cas::user()->isAdmin()) the question must be asked
            return back()->with('deleted_vote_err', 'You are not allowed to delete this vote');
        
        $vote->delete();
        return back()->with('deletedVote', "The vote $vote->titre is deleted");
    }

    public function create()
    {
        return view('votes.create')->with('form', $this->form());
        
    }

    public function store(Request $request)
    {
        $form = $this->form();
        $form->redirectIfNotValid();
        $data = $form->getFieldValues();
        $users = User::getUserFromJson($data['users']);
        $groupes = Groupe::getGroupesFromNames($data['groupes'])->map(function ($val){
            return $val->id;
        });
        $vote = Votes::firstOrCreate([
            'titre' => ucwords($data['titre']),
            'description' => $data['description'],
            'user_id' => Cas::user()->id
        ]);

        $vote->importGroupe($groupes);
        $vote->importUser($users);

        return redirect('/votes')->with('votePublier', $vote);
    }

    public function form($model = null)
    {
        return $this->formBuilder->create('App\Forms\VotesForm', [
            'method' => 'POST',
            'url' => route('votes.store'),
            'model' => $model
        ]);
    }
}
