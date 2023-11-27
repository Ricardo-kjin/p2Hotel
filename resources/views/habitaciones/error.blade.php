@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card my-1">
          <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">ERROR</h6>
              </div>
          </div>
          <div class="card-body px-0 pb-2">

              <h1>Error al obtener los datos</h1>
              <p>{{ $error }}</p>
          </div>
      </div>
  </div>
</div>

@endsection
