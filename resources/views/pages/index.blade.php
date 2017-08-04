@extends('main')
@section('title', '| Home')
@section('content')      
  <div class="row">
    <div class="col-md-4 text-center">
      <div class="col-md-12">
        <h3><span class="label label-default text-uppercase">Control calidad</span></h3>
      </div>
      <div class="col-md-12 px-2">
        <a href="quality"><img src="{{asset('img/list.png')}}" class="img-responsive center-block"></a>
      </div>
    </div>
    <div class="col-md-4 text-center">
      <h3><span class="label label-default text-uppercase">Peritajes</span></h3> 
      <a href="expert"><img src="{{asset('img/car-inspection.png')}}" class="img-responsive center-block"></a>
    </div>
    <div class="col-md-4 text-center">
      <h3><span class="label label-default text-uppercase">Inspecciones visuales</span></h3> 
      <a href="inspection"><img src="{{asset('img/car-repair-check.png')}}" class="img-responsive center-block"></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 text-center">
      <h3><span class="label label-default text-uppercase">Colisión exprés</span></h3> 
      <a href="collision"><img src="{{asset('img/car-painting.png')}}" class="img-responsive center-block"></a>
    </div>
    <div class="col-md-4 text-center">
      <h3><span class="label label-default text-uppercase">Fotos OT</span></h3> 
      <a href="photo"><img src="{{asset('img/photo-camera.png')}}" class="img-responsive center-block"></a>
    </div>
    <div class="col-md-4 text-center">
      <h3><span class="label label-default text-uppercase">Precios OM</span></h3> 
      <a href="price"><img src="{{asset('img/label.png')}}" class="img-responsive center-block"></a>
    </div>
  </div>
@endsection
  