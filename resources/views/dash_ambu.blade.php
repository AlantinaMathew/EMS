@extends('ambu_dash_lay')


@section('content')


<div class="outer">
    <div style="overflow-x: auto;">
        <table>
            <tr>
                <th>Place</th>

                <th>Location</th>
                <th>Phone No</th>

                <th>Location</th>
                <th>Status</th>

            </tr>
            @if(count($donor)>0)

            @foreach($donor as $tr)

            <tr>
                <td>
                    {{$tr->place}}
                </td>
                <td>
                    {{$tr->phone}}
                </td>
                <td>
                    {{$tr->bloodgrp}}
                </td>
                <td>
                    <a href="https://wa.me/{{$tr->phone}}"><button>call</button></a>
                </td>
            </tr>
            @endforeach
        </table>

        @else
        <h1>No Request found </h1>
        @endif
    </div>
</div>
@endsection