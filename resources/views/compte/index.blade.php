<x-app-layout>  

<div class="index">
    @foreach ($comptes as $item)

<div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        {{$item->titulaire}}
       <p>tel : {{$item->tel}}</p>
        <p>creer le {{$item->created_at}}</p>
    </div>
    <div class="card-footer">
        <a href="{{route("compte.show",$item->id)}}">detail</a>
        <a href="{{route('compte.deposer_form',$item->id)}}">depot</a>
        <a href="{{route('compte.retrait_form',$item->id)}}">retrait</a>
    </div>
</div>
    
@endforeach
</div>
<a class="btn-add" href="{{route('compte.create')}}">
    +
</a>
</x-app-layout>

