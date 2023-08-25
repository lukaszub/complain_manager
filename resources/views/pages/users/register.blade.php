@extends('layout')

@section('content')

<div class="text-center">
  <h4>Rejestracja:</h4>
</div>

<form method="POST" action="/users">
  @csrf
  <div class="row justify-content-center py-5">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imię i Nazwisko:</label>
        <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{old('name')}}">

        @error('name')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Adres e-mail::</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">

        @error('email')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Hasło:</label>
        <input type="password" class="form-control" id="password" name="password"
        value="{{old('password')}}">

        @error('password')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Powtórz Hasło:</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        value="{{old('password_confirmation')}}">

        @error('password_confirmation')
        <p class="text-danger">{{$message}}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Utwórz użytkownika</button>
    </div>
  </div>
</form>

@endsection