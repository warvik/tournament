<?php

namespace App\Http\Controllers;

use App\Tournamentclass;
use Illuminate\Http\Request;

class GenerateGroupsController extends Controller
{
    public function restart(Tournamentclass $tournamentclass) {
        return redirect('/classes/' . $tournamentclass->id . '/regenerate/groups/confirm');
    }

    public function reconfirm(Tournamentclass $tournamentclass) {
        return view('generategroups.confirmgenerategroups', [ 'class' => $tournamentclass]);
    }

    public function regenerate(Request $request, Tournamentclass $tournamentclass) {

        if ( ! $request->has('action') ) {
            throw new \Exception('No action given.');
        }

        $action = $request->input('action');

        if ( $action == 'proceed' ) {

        }
        
        return redirect('/classes/' . $tournamentclass->id);
    }

    public function generateAllGroups(Request $request) {
        $classes = TournamentClass::latest()->get();

        $classes->each(function($class){
            $class->createGroups();
        });

        return redirect('/classes');
    }

}
