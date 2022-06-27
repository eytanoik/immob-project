<div class="card-header text-warning">
        <h3>Offres compatibles</h3>
    </div>

    <div class="card-body">
        @foreach($offre_cs as $offre_c) 
        <div class="card my-3">
            <card-header class="shadow-sm">
                <div class="text-warning fw-bold m-1">{{$offre_c->user->name}}</div>
            </card-header>

            <div class="card-body d-flex">
                <div class="text-center">
                    image
                    <!-- <img src="{{$offre_c->image}}" alt="" style="width:200px"> -->
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th style="font-size: 14px">
                            Adresse:
                            </th>

                            <th style="font-size: 14px">
                                Prix: 
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td style="font-size: 12px">{{$offre_c->adresse}}</td>
                        
                            <td style="font-size: 12px">{{$offre_c->price}}$</td>
                        </tr>    
                    </tbody>   
                </table>
            </div>
                    
            <div class="d-flex justify-content-end m-1">
                <a href="{{route('compatibles', $offre_c->id)}}" class="btn btn-sm btn-warning text-white m-1">Voir l'offre</a>
            </div>
        
        </div>
        @endforeach
    </div>



            
   