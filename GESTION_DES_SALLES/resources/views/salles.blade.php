@extends('layout')
@section('salles')

<button class="favorite styled" type="button" data-bs-toggle="modal" data-bs-target="#addSalle">Ajouter salle</button>
<div>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</div>
<div class="container-fluid">
    <div class="card shadow border-0 mb-7">
        <div class="table-responsive">
            <!-- if (!empty($salles)): -->
            <table class="table table-hover table-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Descrition</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salles as $salle)
                    <tr>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$salle->name}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$salle->description}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$salle->status}}
                            </a>
                        </td>
                        <td class="d-flex gap-2">
                            <form method="POST" action="{{ route('desactivateSalle', $salle->id) }}">
                                @csrf
                                <input type="submit" class="btn btn-sm {{ $salle->status == 'reservee' ? 'btn-dark' : 'btn-neutral' }}" 
                                value="{{ $salle->status == 'reservee' ? 'Reservée' : 'allowed' }}">
                            </form>
                            <a href="/editeSalle/{{ $salle->id }}"><img class="ms-2 edit"><input type="submit" class="btn btn-sm btn-neutral" value="Modifier"></a>
                            <form method="POST" action="{{ route('deleteSalle', $salle->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Supprimer">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addSalle" tabindex="-1" aria-labelledby="addSalleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('salles.store')}}">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addSalleLabel">Ajouter Salle</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Saisir le nom de la salle"
                            aria-describedby="nomUtilisateur">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Saisir le description du salle"
                            aria-describedby="nomUtilisateur">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class=" btn btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection