@extends('layout') 


@section('content')
<head>

</head>
<BODY>


<div class="outer">
    <div style="overflow-x: auto;">
    @if(count($a)>0)
        <table>
        <tr>
        <th>Email</th>
                <th>Place</th>
                <th>Vehicle No</th>


                <th>Phone No</th>

               
                <th>Send Request</th>

            </tr>


            @foreach($a as $tr)
           
            <tr>
                <td>
                    {{$tr->email}}
                </td>
                <td>
                {{$tr->place}}
                </td>
                <td>
                    
                    {{$tr->vehicle_num}}
                </td>
                <td>
                    {{$tr->phone}}
                </td>
               
                <td>
                @php $userID = $tr->id;  @endphp
                <a href="{{ route('req.ambu', ['id'=>$userID]) }}"> 

                    <button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Send Request</button></a>
                </td>
            </tr>
            @endforeach
        </table>

@else
<h1>No Ambulance found </h1>
@endif

    </div>
</div>
</BODY>
@endsection