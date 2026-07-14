@extends('layouts.app', ['activePage' => 'home'])

@section('title', 'Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani')

@section('content')
  @include('home.hero')
  @include('home.stats')
  @include('home.sejarah')
  @include('home.jenjang')
  @include('home.fasilitas')
  @include('home.cta')
@endsection
