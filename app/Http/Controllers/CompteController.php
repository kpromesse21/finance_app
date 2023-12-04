<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Transaction;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes=Compte::all();

        return view("compte.index",['comptes'=>$comptes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compte.createForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compte=new Compte();

        $compte->titulaire=$request->titulaire;
        $compte->tel=$request->tel;
        $compte->solde=$request->solde;
        $compte->save();
        return redirect()->route("compte.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compte=Compte::find($id);
        $transactions=Transaction::where("compte_id",$id)->get();

        // dd($transactions);

        return view("compte.show",[
            'compte'=>$compte,
            'transaction'=>$transactions
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function depotForm(string $id)
    {
        return view('compte.depotForm',["id"=>$id]);
    }
    public function retraitForm(string $id)
    {
        return view('compte.retraitForm',["id"=>$id]);
    }



    public function depotStore(Request $request)
    {
        $compte=Compte::find($request->id);
        $compte->solde+=$request->montant;

        $this->addOperation($request->id,"depot",$request->montant);
        $compte->save();
        return redirect()->route('compte.index');
    }
    public function retraitStore(Request $request)
    {
        $compte=Compte::find($request->id);
        $compte->solde-=$request->montant;
        $this->addOperation($request->id,"retrait",$request->montant);
        $compte->save();
        return redirect()->route('compte.index');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compte=Compte::find($id);
        $compte->delete();
        return redirect()->route('compte.index');
    }

    public function addOperation($id,string $nom,float $montant){
        $transation=new Transaction();
        $transation->operation=$nom;
        $transation->montant=$montant;
        $transation->compte_id=$id;
        $transation->save();
    }
}
