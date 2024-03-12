@extends('layouts.main')
@section('title', 'Tito Fishes')

@section('content')
<div class="welcome-container">
    <div class="discover-container">
    <p>Lorem ipsum dolor sit amet.
    </p>
    <a href="#fishes" class="fishes-btn">Discover</a>
    </div>
    
</div>

<div class="fishes-preview-container">
    <div class="text-container">
    <h1>Our Favourites</h1>
    </div>
    <div class="imgs-container">
        <div class="box" id="box1">Salt water fishes</div>
        <div class="box" id="box2">Beta Longfin</div>
        <div class="box" id="box3">Small fins</div>
        <div class="box" id="box4">Championship winners</div>
        <div class="box" id="box5">New line</div>
        <div class="box" id="box6">Carps</div>
    </div>
</div>

@endsection