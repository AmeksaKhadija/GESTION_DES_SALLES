<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .modal{
            display: block !important;

        }
    </style>
        <!-- Modal -->
        <div class="modal" id="reservationModal{{$salle->id}}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reservationModalLabel{{$salle->id}}">Réserver la salle : {{ $salle->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('reservee') }}">
                            @csrf
                            <input type="hidden" name="salle_id" value="{{ $salle->id }}">

                            <div class="mb-2">
                                <label for="date_debut{{$salle->id}}" class="form-label">Date de début :</label>
                                <input type="datetime-local" id="date_debut{{$salle->id}}" name="date_debut" class="form-control" required>
                                @error('date_debut')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="date_fin{{$salle->id}}" class="form-label">Date de fin :</label>
                                <input type="datetime-local" id="date_fin{{$salle->id}}" name="date_fin" class="form-control" required>
                                @error('date_fin')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <input type="submit" class="btn btn-primary" value="Confirmer la réservation">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>