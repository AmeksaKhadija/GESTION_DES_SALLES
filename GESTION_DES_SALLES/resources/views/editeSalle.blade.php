@extends('layout')
@section('editeSalle')

<div>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>


<div class="modal-content">
    <form method="POST" action="{{ route('updateSalle') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $salle->id }}">
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nom du salle</label>
                <input type="text" class="form-control" name="name" value="{{$salle->name}}" id="name" placeholder="Saisir le description du salle"
                    aria-describedby="nomUtilisateur">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description du salle</label>
                <input type="text" class="form-control" name="description" value="{{$salle->description}}" id="description" placeholder="Saisir le description du salle"
                    aria-describedby="nomUtilisateur">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" name="status" value="{{$salle->status}}" id="status" placeholder="Saisir le status du salle"
                    aria-describedby="nomUtilisateur">
            </div>

            <div class="modal-footer">
                <a href="/salles"><input type="button" class="btn btn-dark" data-dismiss="modal"
                        value="Cancel"></a>
                <input type="submit" name="submit" class="btn btn-dark" value="Modify">
            </div>
        </div>
    </form>
</div>


@endsection