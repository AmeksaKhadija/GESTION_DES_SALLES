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
            <form method="POST" action="/updateSalle">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom du salle</label>
                            <input type="number" class="form-control task-desc" name="id" value="{{ $salle->id }}"
                        hidden>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du salle</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Saisir le description du salle"
                            aria-describedby="nomUtilisateur">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="Saisir le status du salle"
                            aria-describedby="nomUtilisateur">
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class=" btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    

@endsection