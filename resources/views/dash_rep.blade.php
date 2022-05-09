@extends('rep_dash_lay')


@section('content')
<style>
    .c {

border-radius: 5px;
background-color: #fff;
padding: 20px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
align-items: center;
}

.col-25 {
float: left;
width: 25%;
margin-top: 6px;
}

.col-75 {
float: left;
width: 75%;
margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

.out {
display: flex;
justify-content: center;
align-items: center;
margin-top: 8em;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {

.col-25,
.col-75,
input[type=submit] {
    width: 100%;
    margin-top: 0;
}
}

</style>
</head>
<body>

    <div class="out">
        <div style="overflow-x: auto;margin-top:9em;">
            <x-auth-session-status class="mb-4" :status="session('status')" />
           
            @if(count($a)>0)
            <table>
            <tr>
                <th>Place</th>
                <th>Location</th>
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
  <!-- <a href="{{ route('decline_fuel', $tr->id) }}"> -->
      <button style=" background-color:red;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;"class="btn"><i class="fa fa-close"></i> Decline</button></a>

<!-- <a href="{{ route('accept_fuel', $tr->id) }}"> -->
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
  <td><!-- <a href="{{ route('cmplt_fuel', $tr->id) }}"> -->
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

    


    
    <script>
    function openForm() {
        document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("popupForm").style.display = "none";
    }

    function openForm1() {
        document.getElementById("popupForm1").style.display = "block";
    }

    function closeForm1() {
        document.getElementById("popupForm1").style.display = "none";
    }
    </script>
    </body>

   