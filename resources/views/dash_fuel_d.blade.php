@extends('fuel_dash_lay')


@section('content')



<div class="outer">
    <div style="overflow-x: auto;">
    <x-auth-session-status class="mb-4" :status="session('status')" />
       
            @if(count($a)>0)
            <table>
            <tr>
                <th>Place</th>

                <th>Location</th>
                <th>View Location</th>
                <th>Phone No</th>
                <th>Fuel</th>
                <th>Price</th>

               
                <th>Status</th>
                <th></th>
                

            </tr>
            @foreach($a as $tr)

            <tr>
                <td>
                    {{$tr->place}}
                </td>
                <td>
                    {{$tr->location}}
                </td>
                <td>
                    @if($tr->crnt_loc==0)
                        Location not Shared 
                    @else
                      
  <a href="{{ route('view_loc_fuel', $tr->id) }}"><button class="btn"><i class="fa fa-close"></i>View Location</button></a>
  @endif </td>
                <td>
                    {{$tr->phone}}
                </td>
                <td>
                    {{$tr->fuel}}
                </td>
                <td>
                    {{$tr->price}}
                </td>
                @if($tr->status==0)
                <td>  <button style="background-color:red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Declined</button></td>
                               

                                @endif

                           
                
            </tr>
            @endforeach
        </table>

        @else
        
        <h1>No Request found </h1>
        @endif
    </div>
</div>
@endsection