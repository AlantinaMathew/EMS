@extends('ambu_dash_lay')


@section('content')



<div class="outer">
    <div style="overflow-x: auto;">
    <x-auth-session-status class="mb-4" :status="session('status')" />
       
    <table>
        <tr>
<th colspan="3">Petrol</th>
<th colspan="3">Diesel</th>
        </tr>
        <tr>
        <td colspan="2">{{$petrol}}</td>
        <td><button style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Edit</button></td>
  <td colspan="2">{{$disel}}</td>
        <td><button style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Editt</button></td>
        </tr>

    </table>
    </div>
</div>
@endsection