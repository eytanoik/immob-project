@extends('app')

@section('content')

<div class="my-2 container">
    <div class="row justify-content-center">
        @if(isset($offre_cs))
            <div class="col-md-7"> 
                <div class="card">
                    <div class="card-header">
                    <h3>Demandes existantes.</h3>
                    </div> 

                    <div class="card-body"> 
                    @foreach($demandes as $demande)   
                    @component('component.demandes', ['demande'=> $demande])
                    @endcomponent
                    @endforeach
                    </div>
                </div>
            </div>
                
            <div class="col-md-5">   
            @component('component.offres', ['offre_cs' => $offre_cs])
            @endcomponent
            </div>
        @else
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h3>Demandes existantes.</h3>
                </div>
            
                <div class="card-body"> 
                @foreach($demandes as $demande)   
                @component('component.demandes', ['demande'=> $demande])
                @endcomponent
                @endforeach
                </div>
            </div>
        </div>
        @endif
    </div> 
</div>
@endsection