@if (isset($reservations) && !$reservations->isEmpty())
    <table>
        <tr>
            <th>Salle</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Salle status</th>
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->salle->name }}</td>
                <td>{{ $reservation->date_debut }}</td>
                <td>{{ $reservation->date_fin }}</td>
                <td>{{ $reservation->status }}</td>
            </tr>
        @endforeach
    </table>

@else
    <p>Aucune réservation trouvée.</p>
@endif