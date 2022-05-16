@extends('rep_dash_lay')


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
                <th>Fuel</th>
                <th>Phone No</th>
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

                        <a href="{{ route('view_loc_rep', $tr->id) }}"><button class="btn"><i
                                    class="fa fa-close"></i>View Location</button></a>
                        @endif
                    </td>
                <td>
                    {{$tr->fuel}}
                </td>
                <td>
                    {{$tr->phone}}
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
                                @elseif($tr->status==1)
                                <td> <button style="background-color:orange; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Pending</button></td>

  <td>
<a href="{{ route('decline_rep', $tr->id) }}"> 
      <button style=" background-color:red;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;"class="btn"><i class="fa fa-close"></i> Decline</button></a>

 <a href="{{ route('accept_rep', $tr->id) }}"> 
  <button style="background-color: DodgerBlue;
  border: none;
  color: white;
  margin-left:2px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;"class="btn"><i class="fa fa-check-square">Accept</i> </button></a>
  </td>

                                @elseif($tr->status==2)
                                <td>  <button style="background-color:blueviolet; /* Green */
  border: none;
  color: white;
 
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Accepted</button></td>
  <td><a href="{{ route('cmplt_rep', $tr->id) }}">
  <button style="background-color: DodgerBlue;
  border: none;
  color: white;
  margin-left:2px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;"class="btn"><i class="fa fa-check-square">Mark Complete</i> </button></a></td>
                                @else
                                <td>  <button style="background-color:black; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Completed</button></td>
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
            
       

    


