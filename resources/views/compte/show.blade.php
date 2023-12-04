
<x-app-layout>
<div class="details">
    <h1 class=" text-center">detail compte</h1>
<h1 >Titulaire: {{$compte->titulaire}}</h1>
<h4>Tel: {{$compte->tel}}</h4>
<h1>Solde : {{$compte->solde}} USD</h1>
<a href="" class="border p-2 my-2 block hover:bg-red-600 text-white text-center">supprimer le compte</a>
</div>

<div class="transactions">
    @foreach ($transaction as $item)

       <div class="card">
        <p>Operation : {{$item->operation}}</p>
        <p>Montant : {{$item->montant}} USD</p>
        <p>Fait le , {{$item->created_at}}</p>
       </div>
    @endforeach
    </x-app-layout>

