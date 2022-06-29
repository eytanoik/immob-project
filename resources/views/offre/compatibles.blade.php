@extends('app')

@section('content')
<div class="container my-2 d-flex justify-content-center">
    <div class="col-md-8 ">
        <div class="card my-3">
            <card-header class="shadow-sm">
                <div class="text-warning fw-bold m-1">{{$offre_c->user->name}}</div>
            </card-header>

            @if(isset($offre_c->image))
                   <div class="my-3 d-flex justify-content-center">
                            <img src="{{asset('storage/'.$offre_c->image)}}" style="width:90%" alt="">
                    </div>
            @endif
       
            <table class="table">
                <tbody>
                    <tr>
                        <th>
                        Type de bien:
                        </th>

                        <td>{{$offre_c->type }}</td>
                    </tr>

                    <tr>
                        <th>
                        Adresse: 
                        </th>

                        <td>{{$offre_c->adresse }}</td>
                    </tr>

                    <tr>
                        <th>
                        Surface: 
                        </th>

                        <td>{{$offre_c->surface }}m2</td>
                    </tr>

                    <tr>
                        <th>
                        Prix: 
                        </th>

                        <td>{{$offre_c->price}}$</td>
                    </tr>    
                </tbody>   
            </table>
            
            <div class="mr-2 mb-2 d-flex justify-content-end">
                <button onclick="sendMail()" class="btn btn-sm btn-warning text-white m-1">Contacter l'utilisateur</button>
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
                        <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Non, continuer de voir les offres</a>
                        <a href="{{route('sendmail', $offre_c->id)}}" type="submit" class="btn btn-warning text-white">Envoyer</a>
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