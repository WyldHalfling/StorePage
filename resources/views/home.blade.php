@extends('layouts.app')
@section('title', 'Homepage')
@section('data-page-id', 'home')

@section('content')
    <div class="home">
        <section class="hero">
            <div class="hero-slider">
                <div> <img src="/images/sliders/slide_1.jpg" alt="PK E-Store"> </div>
                <div> <img src="/images/sliders/slide_2.jpg" alt="PK E-Store"> </div>
                <div> <img src="/images/sliders/slide_3.jpg" alt="PK E-Store"> </div>
            </div>
        </section>

        <section>
            <div id="root">
                @{{ message }}
            </div>
        </section>
    </div>
    <script>
        new Vue({
            el:'#root',
            data: {
                message: 'This is short intro to VueJS.'
            }
        });
    </script>
@stop