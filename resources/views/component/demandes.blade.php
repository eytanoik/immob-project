<div class="card my-3">
    <card-header class="shadow-sm">
    <div class="text-primary fw-bold m-1">{{$demande->user->name}}</div>
    </card-header>
    <card-body>    
        <table class="table">
            <tbody>
                <tr></tr>
                <tr>
                    <th>
                    Type de bien:
                    </th>

                    <td>{{$demande->type }}</td>
                </tr>

                <tr>
                    <th>
                    Adresse: 
                    </th>

                    <td>{{$demande->adresse }}</td>
                </tr>

                <tr>
                    <th>
                    Surface Minimum: 
                    </th>

                    <td>{{$demande->surface_min }}m2</td>
                </tr>

                <tr>
                    <th>
                    Surface Maximum: 
                    </th>

                    <td>{{$demande->surface_max }}m2</td>
                </tr>

                <tr>
                    <th>
                    Price Minimum: 
                    </th>

                    <td>{{$demande->price_min }}$</td>
                </tr>

                <tr>
                    <th>
                    Price Maximum:
                    </th>

                    <td> {{$demande->price_max }}$</td>
                </tr>

            </tbody>   
        </table>

        <div class="d-flex justify-content-center mb-1">
            <a href="{{route('demande.show', $demande->id)}}" class="btn btn-sm btn-primary m-1">Recherche des offres compatibles</a>
            <a href="{{route('demande.edit', $demande->id)}}" class="btn btn-sm btn-secondary m-1">Modifier</a>    
        </div>
    </card-body>   

</div>
 
