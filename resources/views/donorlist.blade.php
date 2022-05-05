@extends('layout_donor')


@section('content')
<head>
<link rel="stylesheet" href="../css/style3.css">
</head>
<BODY>


<div class="outer">
    <div style="overflow-x: auto;">
        <table>
        <tr>
                <th>Place</th>


                <th>Phone No</th>

                <th>Blood Group</th>
                <th>Call</th>

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
                    <button>call</button>
                </td>
            </tr>
            @endforeach
        </table>

@else
<h1>No Donor found </h1>
@endif

    </div>
</div>
</BODY>
@endsection