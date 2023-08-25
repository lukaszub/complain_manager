@extends('layout')

@section('content')
<div class="container-fluid py-4 ">

  <div class="container-fluid py-3" x-data="{ expanded: false }">
    <button type="button" class="btn btn-outline-primary" @click="expanded = ! expanded">Wyszukiwarka</button>

    <div class="container pt-4" x-show="expanded" x-collapse>
      <form method="POST" action="/search">
        @csrf
        <div class="row justify-content-md-center">
          <div class="col col-lg-2">
            <label for="staticEmail" class=" col-form-label">Adres:</label>
          </div>
          <div class="col-md-auto">
            <input type="text" id="search" class="form-control" name="search" aria-describedby="passwordHelpInline">
          </div>
          <div class="col col-lg-2">
            <button type="submit" class="btn btn-outline-primary">Wyszukaj</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  @if (empty($complainsSearched))
  <x-complains :complains="$complains" />
  <div class="d-flex justify-content-center">
    {!! $complains->links()!!}
  </div>
  @else
  <x-complains :complains="$complainsSearched" />
  @endif


</div>
@endsection
