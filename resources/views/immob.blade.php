@extends('app')

@section('content')

<div class="my-2 container">
    <div class="row justify-content-center">
        @if(isset($demande_cs))
            <div class="col-md-7"> 
               
                <div class="card-header">
                <h3 class="text-primary">Offres existantes</h3>
                </div> 

                <div class="card-body">   
                @component('component.offres', ['offre'=> $offre])
                @endcomponent
                </div>
                
            </div>
                
            <div class="col-md-5">
            @component('component.demandes', ['demande_cs' => $demande_cs])
            @endcomponent
            </div>
        @else
        
        <div>
           
            <div class="card-header">
            <h3 class="text-primary">Offres existantes</h3>
            </div>
        
           <div class="card-body row"> 
            @foreach($offres as $offre) 
            <div class="col-6">
            @component('component.offres', ['offre'=> $offre])
            @endcomponent
            </div>  
            @endforeach
            </div>
           </div>

        </div>
        @endif
    </div> 
</div>
@endsection