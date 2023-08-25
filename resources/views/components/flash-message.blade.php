@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="alert alert-primary fixed-top text-center" role="alert">
  {{session('message')}}
</div>
@endif
