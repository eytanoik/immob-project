<div class="card my-4">
    <card-header class="shadow-sm" style="font-size:16px">
        <div class="m-2"><strong>Demande numero: {{$demande->id}}</strong></div>
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

        <div class="ml-2 mb-2">
            <a href="{{route('demande.edit', $demande->id)}}" class="btn btn-sm btn-secondary">Modifier</a>    
            <a href="{{route('demande.show', $demande->id)}}" class="btn btn-sm btn-primary">Recherche des offres compatibles</a>
        </div>
    </card-body>   

</div>
 
