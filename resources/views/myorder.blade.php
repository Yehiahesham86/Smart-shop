@extends('layouts.app')
@section('nav')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">My Orders</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a><i class="lni lni-chevron-right"></i><a href="javascript:void(0)">My Orders</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section >
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100 m-5">
                <div class="table100">
                    <table>
                        <thead>
                            <tr class="table100-head bg-dark">
                                <th class="column1">Order ID</th>
                                <th class="column2">Payment_id</th>
                                <th class="column2">Date</th>
                                <th class="column3">Customer</th>
                                <th class="column3">Total</th>

                                <th class="column3">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $orders )
                            <tr>
                                <td class="column1 h3">{{$orders->id}}</td>
                                <td class="column2 h5">{{$orders->payment->payment_id}}</td>
                                <td class="column2 h6">{{$orders->payment->updated_at}}</td>
                                <td class="column3 h4">{{auth::user()->name}}</td>
                                <td class="column3 h4">${{$orders->payment->amount}}</td>
                                <td class="column3 h4"><a class="btn btn-primary" href="{{route('index_order_details',['id'=>$orders->payment->payment_id])}}">Details</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection