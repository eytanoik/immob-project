@extends('app')

@section('content')
<div class="my-2 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header text-primary">
                 <h3 >{{isset($offre)? 'Modifier ton offre' : 'Creer une offre' }}</h3>
            </div>


            <div class="card my-3 shadow border-0">
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
                    <form action="{{isset($offre)? route('offre.update', $offre->id) :route('offre.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                       
                        @if(isset($offre))
                        @method('PUT')
                        @endif

                        <div class="form-group mt-2">
                            <label for="type">Type de bien</label>
                            <select name="type" id="type" class="form-control" >
                                <option value="Location">Location</option>
                                <option value="Vente">Vente</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" value="{{isset($offre)? $offre->adresse : ''}}">
                        </div>

                        @if(isset($offre->image))
                            <div class="my-3 d-flex justify-content-center">
                                <img src="{{asset('storage/'.$offre->image)}}" style="width:100%" alt="">
                            </div>
                            @endif

                        <div class="form-group mt-2">
                            <label for="image">{{isset($offre) ? 'Modifier ton image' : 'Image (champs non obligatoire)'}}</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                    <div class="row">
                            <div class="form-group mt-2 col-6">
                                <label for="surface">Surface (m2)</label>
                                <input id="surface" class="form-control" type="text" name="surface" value="{{isset($offre)? $offre->surface : ''}}">
                            </div>

                            <div class="form-group mt-2 col-6">
                                <label for="price">Price ($)</label>
                                <input id="price" class="form-control" type="text" name="price" value="{{isset($offre)? $offre->price : ''}}">
                            </div>
                    </div>

                        <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">{{isset($offre)? 'Modifier' : 'Creer'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
</div>

@endsection
