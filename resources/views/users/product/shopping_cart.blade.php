@extends("users.layout")
@section("content")
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($cart as $item)
                                <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$item->name}}</h5>
                                    @if($item->qty <= 0)
                                        <p class="text-danger">Sản phẩm đã hết hàng</p>
                                    @endif
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$item->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    {{$item->buy_qty}}
                                </td>
                                <td class="shoping__cart__total">
                                    {{$item->price*$item->buy_qty}}
                                </td>
                                <td class="shoping__cart__item__close">

                                    <a href="{{url("/remove-cart",["product"=>$item->id])}}"><span class="icon_close"></span></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if($grandtotal > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>${{$grandtotal}}</span></li>
                            <li>Total <span>${{$grandtotal}}</span></li>
                        </ul>
                        @if($can_checkout)
                            <a href="{{route("check_out")}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @else
                            <a href="javascript:void(0);" style="background-color: gray;" class="primary-btn">PROCEED TO CHECKOUT</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection
