<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
  @foreach ($complains as $complain)
  <div class="col">
    <div class="card mb-3">
      <div class="card-body">
        <p><small class="text-muted">Data zgłoszenia: {{ $complain->created_at }}</small></p>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-house pe-2"></i>Adres:</h6>
        <h5 class="card-title">{{" ". $complain->adress }}</h5>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-house pe-2"></i>Data braku odbioru:</h6>
        <h5 class="card-title">{{ " ".$complain->date_of_absence_collection }}</h5>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-minecart-loaded pe-2"></i>Frakcja:</h6>
        <h5 class="card-title">Plastik</h5>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-telephone pe-2"></i>Numer kontaktowy:</h6>
        <h5 class="card-title">{{ " ".$complain->contact_number }}</h5>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-sticky pe-2"></i>Uwagi:</h6>
        <h5 class="card-title">{{ is_null($complain->note) ? " ---" :  " ".$complain->note }}</h5>
        <h6 class="card-title text-muted mb-0"><i class="bi bi-pentagon pe-2"></i>Status:</h6>
        <h5 class="card-title">{{ " ".$complain->status }}</h5>
        <div class="container text-center">
          <a href="/complains/show/{{$complain->id}}" class="btn btn-outline-primary mt-2 "><i class="bi bi-binoculars pe-1"></i>Podgląd</a>
          <a href="/complains/edit/{{$complain->id}}" class="btn btn-outline-secondary mt-2"><i class="bi bi-pencil-square pe-1"></i>Edycja</a>
          <form method="POST" action="/complains/{{$complain->id}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger mt-2"><i class="bi bi-exclamation-octagon"></i> Usuń</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
