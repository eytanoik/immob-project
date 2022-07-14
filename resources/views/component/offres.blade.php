<div class="card my-3 shadow border-0">
    <card-header class="shadow-sm">
        <div class="text-primary fw-bold m-1">{{$offre->user->name}}</div>
    </card-header>

    @if(isset($offre->image))
            <div class="my-3 d-flex justify-content-center">
                    <img src="{{asset('storage/'.$offre->image)}}" style="width:90%" alt="">
            </div>
    @endif

    <div class="m-3">
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

            <!-- <tr>
                <th>
                Surface: 
                </th>

                <td>{{$offre->surface }}m2</td>
            </tr> -->

            <!-- <tr>
                <th>
                Prix: 
                </th>

                <td>{{$offre->price}}$</td>
            </tr>     -->
        </tbody>   
    </table>
    </div>
    
    <div class="d-flex justify-content-end mb-1">
            <a href="{{route('info', $offre->id)}}" class="btn btn-sm btn-primary text-white m-1">Voir l'offre</a>
          
        @if($offre->user == Auth::user())
            <a href="{{route('offre.edit', $offre->id)}}" class="btn btn-sm btn-secondary m-1">Modifier</a>  
            @endif  
        </div>
</div>
