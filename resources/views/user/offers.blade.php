@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Offers</h1></div>

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
                        <th>Offer</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Generate Code</th>
                    </tr>
                    @foreach ($offers as $offer)
                        <tr>
                            <td class="centertable">{{$offer->name}}</td>
                            <td class="centertable">{{$offer->type}}</td>
                            <td class="centertable">{{$offer->description}}</td>
                            <td class="centertable"><a href="{{ url('/generateCode')}}"><button class="button">Generate</button></a>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@endsection