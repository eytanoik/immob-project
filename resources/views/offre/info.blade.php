@extends('app')

@section('content')
<div class="container my-2 d-flex justify-content-center">
    <div class="col-md-8 ">
        <div class="card my-3 shadow border-0">
            <card-header class="shadow-sm">
                <div class="text-primary fw-bold m-1">{{$offre->user->name}}</div>
            </card-header>

            @if(isset($offre->image))
                   <div class="my-3 d-flex justify-content-center">
                            <img src="{{asset('storage/'.$offre->image)}}" style="width:90%" alt="">
                    </div>
            @endif
       
            <table class="table">
                <tbody>
                    <tr>
                        <th>
                        Type de bien:
                        </th>

                        <td>{{$offre->type }}</td>
                    </tr>

                    <tr>
                        <th>
                        Adresse: 
                        </th>

                        <td>{{$offre->adresse }}</td>
                    </tr>

                    <tr>
                        <th>
                        Surface: 
                        </th>

                        <td>{{$offre->surface }}m2</td>
                    </tr>

                    <tr>
                        <th>
                        Prix: 
                        </th>

                        <td>{{$offre->price}}$</td>
                    </tr>    
                </tbody>   
            </table>
            
            <div class="mr-2 mb-2 d-flex justify-content-end">
                <a href="{{route('offre.show', $offre->id)}}" class="btn btn-sm btn-primary text-white m-1">Recherche des demandes compatibles</a>
                <button onclick="sendMail()" class="btn btn-sm btn-secondary text-white m-1">Contacter l'utilisateur</button>
            </div>
        </div>
            
        <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="sendMailLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="sendMailLabel">Prendre contact avec l'utilisateur</h3>
                    </div>

                    <div class="modal-body">
                    Envoyer un mail a l'utilisateur de cette offre pour l'informer que vous etes interesse par son offre. <br><br>
                    L'utilisateur vous contactera en retour. 
                    </div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Non</a>
                        <a href="{{route('sendmail', $offre->id)}}" type="submit" class="btn btn-primary text-white">Envoyer</a>
                    </div>
                    
                </div>
            </div>
        </div>      
    </div>
</div>

@endsection


    
@section('scripts')
<script>
function sendMail(){
$('#sendMail').modal('show')
}
</script>
@endsection