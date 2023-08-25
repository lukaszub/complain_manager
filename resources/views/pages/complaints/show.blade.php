@extends('layout')
@section('content')
<div class="container justify-content-center mt-5">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
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
          <h6 class="card-title text-muted mb-0"><i class="bi bi-image pe-2"></i>Zdjęcie:</h6>
          <img src="{{ $complain->file ? asset('storage/'. $complain->file) : asset('storage/files/no_image.png')}}" class="img-fluid" alt="image">
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
