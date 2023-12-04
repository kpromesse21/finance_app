



<x-app-layout> 
    <form action="{{route('compte.deposer_store')}}" method="post">
        @csrf
        <div class="form-group">
            <h1 class="title">
                Formulaire de depot
            </h1>
            <input type="hidden" name="id" value="{{$id}}">
        <label for="montant">montant a deposer</label><br>
        <input type="number" name="montant" id="">
        <button type="submit" class="btn-submit">Deposer</button>
        </div>
    </form>
</x-app-layout>