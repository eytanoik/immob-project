<div class="card-header text-warning">
        <h3>Offres compatibles</h3>
    </div>

    <div class="card-body">
        @foreach($offre_cs as $offre_c) 
        <div class="card my-3 shadow border-0">
            <card-header class="shadow-sm">
                <div class="text-warning fw-bold m-1">{{$offre_c->user->name}}</div>
            </card-header>

            <div class="card-body d-flex justify-content-beetween">
                <!-- <div class="row"> -->
                    <div class="col-4">
                        <img src="{{asset('storage/'.$offre_c->image)}}" style="width:160px" alt="" />
                    </div>

                    <div class="col-8">
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
                <!-- </div> -->
            </div>
                    
            <div class="d-flex justify-content-end m-1">
                <a href="{{route('compatibles', $offre_c->id)}}" class="btn btn-sm btn-warning text-white m-1">Voir l'offre</a>
            </div>
        
        </div>
        @endforeach
    </div>



            
   