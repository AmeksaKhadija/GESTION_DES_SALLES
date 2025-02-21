@extends('layout')
@section('reservations')

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
                        <th scope="col">Salle name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Date Debut</th>
                        <th scope="col">Date Fin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                    <tr>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$reservation->salle->name}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$reservation->user_id}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$reservation->date_debut}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$reservation->date_fin}}
                            </a>
                        </td>
                        <td>
                            <a class="text-heading font-semibold" href="#">
                                {{$reservation->status}}
                            </a>
                        </td>
                        <td class="d-flex gap-2">
                            <form method="POST" action="{{ route('accepterreservation', $reservation->id) }}">
                                @csrf
                                <input type="submit" class="btn btn-sm btn-neutral" 
                                value="Accepter">
                            </form>
                            
                            @if($reservation->status != 'accepter')
                            <form method="POST" action="{{ route('rejecterreservation', $reservation->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Rejecter la résérvation">
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection