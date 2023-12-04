
<x-app-layout> 
    <form action="{{route('compte.retrait_store')}}" method="post">
        @csrf
        <div class="form-group">
            <h1 class="title">
                Formulaire de depot
            </h1>
            <input type="hidden" name="id" value="{{$id}}">
            <label for="montant">montant a retirer</label><br>
            <input type="number" name="montant" id="">
        <button type="submit" class="btn-submit">retirer</button>
        </div>
    </form>
</x-app-layout>