<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    .card {
        margin-left: 10%;
        margin-top: 5%;
    }
</style>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="/salles">Pricing</a>

            </div>

        </div>
        <form action="{{ route('mes_reservations') }}" method="GET">
            <label for="user_id">Votre ID :</label>
            <input type="text" name="user_id" required>
            <button type="submit">Voir mes réservations</button>
        </form>
    </div>
</nav>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif


@foreach($salles as $salle)
@if($salle->status == 'allowed')
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$salle->name}}</h5>
        <p class="card-description">{{$salle->description}}</p>
        <p class="card-status">{{$salle->status}}</p>

        <a href="{{ route('reservation.create',$salle->id)}}" class="btn btn-primary btn-sm">
            Réserver cette salle
        </a>

    </div>
</div>
@endif
@endforeach