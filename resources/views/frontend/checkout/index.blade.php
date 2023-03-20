@extends('layouts.frontend')

@section('title')
    Cart
@endsection

@section('content')

    <section class="bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-2 py-3">
                    <h5><a href="/" class="text-dark">Home</a> › Checkout</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{ url('place-order') }}" method="POST"></form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_no" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alternate Phone Number</label>
                                <input type="text" name="alternate_no" class="form-control" placeholder="Alternate Phone Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" class="form-control" placeholder="No #2. Flat no">
                            </div>
                            <div class="form-group">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" class="form-control" placeholder="Church street, POST">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">State</label>
                                <input type="text" name="state" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Pin code </label>
                                <input type="text" name="phone_no" class="form-control" placeholder="Pincode">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="place_order_btn" class="btn btn-primary">Place Your Order</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    @if (isset($cart_data))
                        @if (Cookie::get('shopping_cart'))
                            @php $total="0" @endphp
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_data as $data)
                                <tr>
                                    <td>{{ $data['item_name'] }}</td>
                                    <td>{{ number_format($data['item_price'], 2) }}</td>
                                    <td>{{ $data['item_quantity'] }}</td>
                                    @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-right">
                            <h5>Grand Total: {{ number_format($total , 0)}}</h5>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 mycard py-5 text-center">
                                <div class="mycards">
                                    <h4>Your cart is currently empty.</h4>
                                    <a href="{{ url('collections') }}"
                                        class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
