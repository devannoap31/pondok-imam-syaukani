@extends('frontend.layouts.app', ['activePage' => 'home'])

@section('title', 'Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani')

@section('content')
  @include('frontend.home.hero')
  @include('frontend.home.stats')
  @include('frontend.home.sejarah')
  @include('frontend.home.jenjang')
  @include('frontend.home.fasilitas')
  @include('frontend.home.cta')
@endsection
