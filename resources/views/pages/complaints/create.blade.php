@extends('layout')

@section('content')

      <form method="POST" action="/complains">
        <div class="row justify-content-center py-5">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Adres:</label>
          <input type="text" class="form-control" id="adress" aria-describedby="adress" placeholder="Podaj adres reklamacji" name="adress">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Data braku odbioru:</label>
          <input type="date" class="form-control" id="date_of_absence_collection" name="date_of_absence_collection">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Numer kontaktowy:</label>
          <input type="tel" class="form-control" id="contact_number" name="contact_number">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Frakcja:</label>
          <input type="text" class="form-control" id="contact_number" name="fraction">
        </div>
        <!-- <div class="mb-3">
          <label for="status" class="form-label">Status:</label>
          <select class="form-select" aria-label="status" name="status">
            <option value="zrealizowane">Zrealizowane</option>
            <option value="odrzucone">Odrzucone</option>
            <option value="zaplanowany odbiór">Zaplanowany odbiór</option>
            <option value="brak">Brak</option>
          </select>
        </div> -->
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Uwagi:</label>
          <textarea type="text" class="form-control" id="contact_number"  name="note"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
      </form>

@endsection