<div class="card-header text-warning">
        <h3>Demandes compatibles</h3>
    </div>

@foreach($demande_cs as $demande_c) 
<div class="card my-3 shadow border-0">
    <card-header class="shadow-sm">
    <div class="text-warning fw-bold m-1">{{$demande_c->user->name}}</div>
    </card-header>
    <card-body>    
        <table class="table">
            <tbody>
                <tr></tr>
                <tr>
                    <th>
                    Type de bien:
                    </th>

                    <td>{{$demande_c->type }}</td>
                </tr>

                <tr>
                    <th>
                    Adresse: 
                    </th>

                    <td>{{$demande_c->adresse }}</td>
                </tr>

                <tr>
                    <th>
                    Surface Minimum: 
                    </th>

                    <td>{{$demande_c->surface_min }}m2</td>
                </tr>

                <tr>
                    <th>
                    Surface Maximum: 
                    </th>

                    <td>{{$demande_c->surface_max }}m2</td>
                </tr>

                <tr>
                    <th>
                    Price Minimum: 
                    </th>

                    <td>{{$demande_c->price_min }}$</td>
                </tr>

                <tr>
                    <th>
                    Price Maximum:
                    </th>

                    <td> {{$demande_c->price_max }}$</td>
                </tr>

            </tbody>   
        </table>
    </card-body>   

    <div class="d-flex justify-content-end mb-1">
        <a href="{{route('ofdem',['demande'=>$demande_c->id,'offre'=>$offre->id])}}" class="btn btn-sm btn-warning text-white m-1">Conclure l'affaire</a>
    </div>

</div>
@endforeach
 
<!-- @section('scripts')
<script>
    function accept(that){

        $('div').click(function() {
  var theId = $(this).attr('id');
  alert(theId);
});
    }
</script>
@endsection  -->