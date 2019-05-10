@extends('welcome')

@section('content')
    @if($cart)

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart->items as $product)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-md-2 hidden-xs"><img src="{{ asset('storage/' . $product['item']->image) }}" alt="..."
                                                             class="img-responsive" width="100%"/></div>
                        <div class="col-md-10">
                            <h4 class="nomargin">{{ $product['item']->name }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ '$' . $product['item']->price }}</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="{{ $product['qty'] }}">
                </td>
                <td data-th="Subtotal" class="text-center">{{ $product['price']  }}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </td>
            </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Tổng tiền: ${{ $cart->totalPrice }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                </td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Tổng tiền: ${{ $cart->totalPrice }}</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
            </tfoot>
        </table>

    @else
        <p>{{ 'Bạn chưa mua sản phẩm nào!' }}</p>
    @endif
@endsection

