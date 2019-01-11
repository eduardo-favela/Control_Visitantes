@extends('base')
@section('cssextra')
@endsection
@section('Contenido')
    <div class="row">
        <div class="col-md-10">
            @if(Session::has('flash_message'))
               <p>{{Session::get('flash_message')}}</p>
            @endif
        </div>
    </div>
@endsection
@section('javascript')
@endsection