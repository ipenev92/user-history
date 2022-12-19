@extends('layouts.app')

@section('title', "Details")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Details</h1></div>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <table id="offers">
                    <tr>
                        <th>Code</th>
                        <th>Redeem</th>
                    </tr>
                    @foreach ($codes as $code)
                        <tr>
                            <td class="centertable">{{$code->code}}</td>
                            @if ($code->is_redeemed == 0)
                                <td class="centertable"><a href="{{ url('/redeemCode/' . $code->id)}}"><button class="button">Redeem</button></a>
                            @else
                                <td class="centertable">Redeemed</td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@endsection