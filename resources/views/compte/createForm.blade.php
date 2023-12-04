
<x-app-layout> 
 <nav>
    <a href="{{route("compte.index")}}">retour home</a>
</nav>   
<form action="{{route('compte.store')}}" method="post">
    @csrf

<div class="form-group">
    <h1 class="title">Formulaire de creation de compte</h1>
    <label for="titulare">Nom et prenom du titulaire :</label>
<input type="text" name="titulaire">
<label for="tel">Numero telephone :</label>
<input type="tel" name="tel">
<label for="solde">Solde de depart :</label>
<input type="number" name="solde">
<button type="submit" class="btn-submit">
    Creer
</button>
</div>

</form>
</x-app-layout>




