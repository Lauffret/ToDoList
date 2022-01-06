<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taches = Tache::orderBy('id', 'asc')->get();

        return view('taches.index', compact('taches'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajouter(Request $request)
    {

        $this->validate($request,[
            'tache' => 'required|max:255',
            'date_limite' => 'nullable',
        ]);

        if($request->date_limite != null){
			$date_limite  = str_replace('/', '-', $request->date_limite);
			$date_limite  = date('Y-m-d',strtotime($date_limite));
		}else{
            $date_limite  = null;
        }
    
        Tache::create([
			'tache' => $request->tache,
			'date_limite' => $date_limite ,
        ]);
    
        return redirect('/')->with('success', 'Tache créer avec succèss');
    }

    public function valider($id)
	{
		$tache = Tache::findOrFail($id);
		$est_fait = abs( $tache->est_fait - 1);

		Tache::whereId($id)->update(["est_fait" => $est_fait]);
    
        return redirect('/')->with('success', 'Tache mise à jour avec succèss');
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier(Request $request, $id)
    {
        $this->validate($request,[
            'tache' => 'required|max:255',
            'date_limite' => 'nullable',
        ]);

        if($request->date_limite != null){
			$date_limite  = str_replace('/', '-', $request->date_limite);
			$date_limite  = date('Y-m-d',strtotime($date_limite));
		}else{
            $date_limite  = null;
        }
    
        Tache::whereId($id)->update([
			"tache" => $request->tache,
			"date_limite" => $date_limite,
		]);
    
        return redirect('/')->with('success', 'Tache mise à jour avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function supprimer($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();

        return redirect('/')->with('success', 'Tache supprimer avec succèss');
    }
}
