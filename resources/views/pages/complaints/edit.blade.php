@extends('layout')

@section('content')

<form method="POST" action="/complains/update/{{ $complain->id }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="row justify-content-center py-5">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adres:</label>
        <input type="text" class="form-control" id="adress" aria-describedby="adress" value="{{ $complain->adress }}" placeholder="Podaj adres reklamacji" name="adress">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Data braku odbioru:</label>
        <input type="date" class="form-control" id="date_of_absence_collection" value="{{ $complain->date_of_absence_collection }}" name="date_of_absence_collection">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Numer kontaktowy:</label>
        <input type="tel" class="form-control" id="contact_number" value="{{ $complain->contact_number }}" placeholder="Podaj numer kontaktowy" name="contact_number">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Frakcja:</label>
        <input type="text" class="form-control" id="contact_number" value="{{ $complain->fraction }}" name="fraction">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Pracownik (Kierowca):</label>
        <input type="text" class="form-control" id="contact_number" value="{{ $complain->driver_name }}" name="driver_name" placeholder="Podaj imię i nazwisko kierowcy który nie dokonał odbioru">
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <select class="form-select" aria-label="status" name="status">
          <option {{ value($complain->status) == "zrealizowane" ? "selected" : "" }} value="zrealizowane">Zrealizowane</option>
          <option {{ value($complain->status) == "odrzucone" ? "selected" : "" }} value="odrzucone">Odrzucone</option>
          <option {{ value($complain->status) == "zaplanowany odbiór" ? "selected" : "" }} value="zaplanowany odbiór">Zaplanowany odbiór</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Data odbioru reklamacji:</label>
        <input type="date" class="form-control" id="date_of_absence_collection" value="{{ $complain->date_of_collection }}" name="date_of_collection">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Uwagi:</label>
        <!-- <input type="text" class="form-control" id="contact_number" value="{{ $complain->note }}" name="note"> -->
        <textarea type="text" class="form-control" id="contact_number" name="note">{{ $complain->note }}</textarea>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Plik do dodania:</label>
        <input class="form-control" type="file" id="formFile" name="file">
        @error('file')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

@endsection
