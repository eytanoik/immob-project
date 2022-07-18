@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-primary text-center" style="font-size: 80px">
               Salut {{Auth::user()->name}}, 
                    Bienvenue sur Immob'
                </div>
            </div>

           <div class="m-3 d-flex justify-content-center">
                <a href="/immob" type="button" class="btn btn-primary btn-lg">Decouvre les offres et les demandes, et tente de conclure des affaires !</a>
           </div>
        </div>
    </div>
</div>
@endsection
