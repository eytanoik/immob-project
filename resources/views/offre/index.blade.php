@extends('app')

@section('content')
<div class="my-2 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-header">
                    <h3 >Cree ton offre</h3>
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
                    <form action="{{route('offre.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group mt-2">
                            <label for="type">Type de bien</label>
                            <select name="type" id="type" class="form-control" >
                                <option value="Location">Location</option>
                                <option value="Vente">Vente</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" >
                        </div>

                        <div class="form-group mt-2">
                            <label for="image">Image (champs non obligatoire)</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                    <div class="row">
                            <div class="form-group mt-2 col-6">
                                <label for="surface">Surface (m2)</label>
                                <input id="surface" class="form-control" type="text" name="surface" value="">
                            </div>

                            <div class="form-group mt-2 col-6">
                                <label for="price">Price ($)</label>
                                <input id="price" class="form-control" type="text" name="price" value="">
                            </div>
                    </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Creer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
</div>

@endsection

<!-- @section('scripts')
<script>
    function offres(){
        $('#offres').show()
    }
</script>
@endsection -->