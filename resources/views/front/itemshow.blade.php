@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="row">



            @foreach ($products as $product)
               <div class="col-sm-6 col-md-4">
                <div class="thumbnail item-box">

                    <img src="{{asset('assets/front/img/product-2.jpg')}}" alt="">
               <div class="caption">
               <h3>{{$product -> name}}</h3>
                <p>{{$product -> price}}</p>
               <p></p>

               <a class="nav-link btn btn-success" href="{{route('front.add', $product)}}">{{__('messages.add')}}</a>
               </div>
                </div>
                </div>
                @endforeach

        </div>
    </div>


@endsection

