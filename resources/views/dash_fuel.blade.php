@extends('fuel_dash_lay')


@section('content')

<head>
    <style>
    * {
        box-sizing: border-box;
    }

    .openBtn {
        display: flex;
        justify-content: left;
    }

    .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 14px 20px;
        cursor: pointer;
        position: fixed;
    }

    .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
    }

    .formPopup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
    }

    .formContainer {
        max-width: 2500px;
        padding: 20px;
        background-color: #fff;
        height: 300px;
    }

    input[type=text] {
        width: 100%;
        padding: 14px;
        margin-top: 1em;
        border: 1px solid #5995fd;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #5995fd;
        color: white;
        margin-top: 2em;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #5995fd;

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



    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
    }

    .formContainer .cancel {
        background-color: #cc0000;
    }

    .formContainer .btn:hover,
    .openButton:hover {
        opacity: 1;
    }
    </style>
</head>

<body>


    <div class="outer">
        <div style="overflow-x: auto;">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <table>
                <tr>
                    <th colspan="3" style="width:50%;">Petrol</th>
                    <th colspan="3" style="width:50%;">Diesel</th>
                </tr>
                <tr>
                    <td colspan="2" style="width:35%;">{{$petrol}}</td>
                    <td style="width:15%;"><button style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" onclick="openForm()">Edit</button></td>
                    <td colspan="2" style="width:35%;">{{$disel}}</td>
                    <td style="width:15%;"><button style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;" onclick="openForm1()">Editt</button></td>
                </tr>

            </table>
        </div>
    </div>
    <div class="outer">
        <div style="overflow-x: auto;margin-top:9em;">
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

                        <a href="{{ route('view_loc_fuel', $tr->id) }}"><button class="btn"><i
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
                    <td> <button style="background-color:red; /* Green */
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
                        <a href="{{ route('decline_fuel', $tr->id) }}"><button style=" background-color:red;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;" class="btn"><i class="fa fa-close"></i> Decline</button></a>

                        <a href="{{ route('accept_fuel', $tr->id) }}">
                            <button style="background-color: DodgerBlue;
  border: none;
  color: white;
  margin-left:2px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;" class="btn"><i class="fa fa-check-square">Accept</i> </button></a>
                    </td>

                    @elseif($tr->status==2)
                    <td> <button style="background-color:blueviolet; /* Green */
  border: none;
  color: white;
 
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Accepted</button></td>
                    <td><a href="{{ route('cmplt_fuel', $tr->id) }}">
                            <button style="background-color: DodgerBlue;
  border: none;
  color: white;
  margin-left:2px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;" class="btn"><i class="fa fa-check-square">Mark Complete</i> </button></a></td>
                    @else
                    <td> <button style="background-color:black; /* Green */
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

    <div class="loginPopup">
        <div class="formPopup" id="popupForm">
            <form action="/update_petrol" method="post" class="formContainer">
                @csrf

                <div class="row">
                    <div class="col-25">
                        <label for="petrol">
                            <strong>Update The Price Of Petrol</strong>
                        </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="petrol" name="petrol" required>
                    </div>
                </div>


                <button type="submit" class="btn">Update</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
    </div>


    <div class="loginPopup b">
        <div class="formPopup b" id="popupForm1">
            <form action="/update_disel" method="post" class="formContainer">@csrf
                <div class="row">
                    <div class="col-25">
                        <label for="petrol">
                            <strong>Update The Price Of Disel</strong>
                        </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="petrol" name="disel" required>
                    </div>
                </div>


                <button type="submit" class="btn">Update</button>
                <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
            </form>
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

    @endsection