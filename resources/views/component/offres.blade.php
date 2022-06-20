<div class="card">
    <div class="card-header">
        <h4>Offres compatibles.</h4>
    </div>

   
    <div class="card-body">
    @foreach($offre_cs as $offre_c) 
        <div class="card my-3">
       
            <table class="table">
                <tbody>
                    <!-- @if(isset($offre_c->image))
                    <tr>
                        <td>
                            <img src="{{asset('storage/'.$offre_c->image)}}" alt="">
                        </td>
                    </tr>
                    @endif
             -->

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
                <button onclick="sendMail()" class="btn btn-sm btn-primary">Contacter l'utilisateur</button>
            </div>
            
            <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="sendMailLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="sendMailLabel">Prendre contact avec l'utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        Envoyer un mail a l'utilisateur de cette offre pour l'informer que vous etes interesse par son offre.
                        L'utilisateur vous contactera en retour. 
                        </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary text-white" data-dismiss="modal">Non, continuer de voir les offres.</a>
                                <a href="{{route('sendmail', $offre_c->id)}}" type="submit" class="btn btn-primary">Envoyer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

    



@section('scripts')
<script>
function sendMail(){
$('#sendMail').modal('show')
}
</script>
@endsection





