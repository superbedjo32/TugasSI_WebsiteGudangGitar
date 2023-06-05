@extends('layout')

@section('content')
    <h1 class="h2">Gibson Dashboard</h1>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .photo {
            position: relative;
            margin: 10px;
        }

        img {
            width: 400px;
            height: auto;
            border-radius: 5px;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 5px;
        }

        .photo:hover .overlay {
            opacity: 1;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>

    <div class="gallery">
        <div class="photo">
            <img src="{{ '/img/1.jpg' }}" alt="Foto 1">
            <div class="overlay">
                <div class="text">Les Paul Gallery</div>
            </div>
        </div>

        <div class="photo">
            <img src="{{ '/img/2.jpg' }}" alt="Foto 2">
            <div class="overlay">
                <div class="text">ES Gallery</div>
            </div>
        </div>

        <div class="photo">
            <img src="{{ '/img/3.jpg' }}" alt="Foto 3">
            <div class="overlay">
                <div class="text">SG Gallery</div>
            </div>
        </div>
    </div>
@endsection
