<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groupe;
use App\UserGroupes;

use App\Providers\CasServiceProvider as Cas;


class GroupeController extends Controller
{

    public function index()
    {
        $user = Cas::user();
        return view('groupe.index')
                ->with('groupes', $user->groupes()->get())
                ->with('ownedGroupes', $user->ownedGroupes);                
    }

    public function get($name)
    {
        return Groupe::getSimilarTo($name);
    }


    public function show(Groupe $groupe)
    {
        return view('groupe.show')->with('groupe', $groupe);
    }


    public function store(Request $request)
    {
        $user = Cas::user();
        if( !$user->isAdmin() && !$user->isTeacher())
            return back();

        $validated = $request->validate([
            'addGroupeName' => 'required|max:255'
        ]);
        
        $groupe = Groupe::firstOrCreate([
            'nom' => ucwords($validated['addGroupeName']),
            'owner_id' => $user->id
        ]);

        if(!empty($request->importPeople))
            $this->importUserFrom($request->importPeople, $groupe);
        
        

        return back()->with('addedGroupe', $groupe->nom);
    }

    protected function importUserFrom($groupes, $newGroupe)
    {
        $groupes = Groupe::getGroupesFromNames($groupes);
        $userIds = [];
        foreach ($groupes as $groupe) {
            
            $userIds = array_merge($userIds, $groupe->userIds()->all());        
        }

        $newGroupe->importUsers($userIds);
    }

    public function update(Groupe $groupe, Request $request)
    {
        $user = Cas::user();
        if($groupe->owner_id != $user->id)
            return back();
        
        $validated = $request->validate([
            'groupeNom' => 'required|max:255'
        ]);

        $groupe->nom = ucwords($validated['groupeNom']);
        $groupe->save();

        return back()->with('editedGroupe', $groupe);
    }

    public function destroy(Groupe $groupe, Request $request)
    {
        $user = Cas::user();
        if($groupe->owner_id != $user->id)
            return back();

        $groupe->delete();

        return back()->with('deletedGroupe', $groupe);
    }

    public function abonner(Request $request)
    {
        $groupes = Groupe::getGroupesFromNames($request->abonnerAuGroupe);
        $user = Cas::user();
        foreach ($groupes as $groupe) {
            $groupe->importUsers([
                $user->id
            ]);
        }

        return back()->with('abonnerAuxGroupes', $groupes);
    }

    public function desabonner(Groupe $groupe, Request $request)
    {
        $user = Cas::user();
        $userGroupe = UserGroupes::where('user_id', Cas::user()->id)
                    ->where('groupe_id', $groupe->id);
        $grp = $userGroupe->get()->first();
        $userGroupe->delete();
        return back()->with('desabonner', $grp);
    }

}
