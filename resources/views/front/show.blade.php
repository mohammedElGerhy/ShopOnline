@extends('layouts.site')


@section('content')
    <div class="container">
        <div class="row">

                <div class="col-md-8">
                    @foreach( $cartItems as $cartItem)
                        <div class="card mb-2">
                            <div class="card-body">

                                <h5 class="card-title">

                                </h5>
                                <div class="card-text">
                                    ${{ $cartItem['name'] }}
                                    ${{ $cartItem['price'] }}
                                    <form action="{{route('front.update',$cartItem -> id)}}" method='get'>
                                        <input type="number" name="quantity" id="qty" value={{ $cartItem['quantity']}}>
                                        <input type="submit" class="button" value="save" >
                                    </form>


                                    <a href="{{route('front.update',$cartItem -> id)}}" class="btn btn-secondary btn-sm">Change</a>
                                    <a href="{{route('front.destroy',$cartItem -> id)}}" class="btn btn-secondary btn-sm">remvoe</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p><strong>Total : ${{\Cart::session(auth()->id())->getTotal()}}</strong></p>

                </div>

                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h3 class="card-titel">
                                Your Cart  SubTotal<span>{{\Cart::session(auth()->id())->getSubTotal()}}</span>
                                <hr>
                            </h3>
                            <div class="card-text">
                                <p>
                                   Total Amount is

                               <span>{{\Cart::session(auth()->id())->getTotal()}}</span>
                                </p>
                                <p>
                                    Total Quantities is{{Cart::session(auth()->id())->getContent()->count()}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

@endsection
