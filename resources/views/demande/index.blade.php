@extends('app')

@section('content')
<div class="my-2 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card card-header">
                <h3>{{isset($demande)? 'Modifie ta demande.' : 'Cree ta demande.' }}</h3>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item">
                            {{$error}}
                        </li>
                        @endforeach
                </ul>
                </div>
            @endif
            
            <div class="card-body">
                <form action="{{isset($demande)? route('demande.update', $demande->id) : route('demande.store')}}" method="POST">
                    @csrf 

                    @if(isset($demande))
                    @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="type">Type de bien</label>
                        <select name="type" id="type" class="form-control" >
                            <option value="Location">Location</option>
                            <option value="Achat">Achat</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" value="{{isset($demande)? $demande->adresse : ''}}">
                    </div>

                <div class="row">
                        <div class="form-group col-6">
                            <label for="surface_min">Surface Minimum (m2)</label>
                            <input id="surface_min" class="form-control" type="text" name="surface_min" value="{{isset($demande)? $demande->surface_min : ''}}">
                        </div>

                        <div class="form-group col-6">
                            <label for="surface_max">Surface Maximum (m2)</label>
                            <input type="text" class="form-control" name="surface_max" id="surface_max" value="{{isset($demande)? $demande->surface_max : ''}}">
                        </div>
                </div>

                <div class="row">
                        <div class="form-group col-6">
                            <label for="price_min">Price Minimum ($)</label>
                            <input id="price_min" class="form-control" type="text" name="price_min" value="{{isset($demande)? $demande->price_min : ''}}">
                        </div>

                        <div class="form-group col-6">
                            <label for="price_max">Price Maximum ($)</label>
                            <input type="text" class="form-control" name="price_max" id="price_max" value="{{isset($demande)? $demande->price_max : ''}}">
                        </div>
                </div>
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{isset($demande)? 'Modifier' : 'Creer' }}</button>
                    </div>
                </form>
            </div>
            </div>  
        </div>
    </div>
</div>

@endsection
