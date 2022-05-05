
@extends('layout_donor') 

@section('content')

<head>
    <style>
    input[type=text],
    select,
    textarea {
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
        <div class="c" style="background:white;">
            <form action="/search_donor" method="POST"onsubmit="return sub();">
            @csrf
                <div class="row">
                    <div class="col-25">
                        <label for="City">City</label>
                    </div>
                    <div class="col-75">
                        <select name="place" id="b" style="width:100%;" required>
                            <option disabled selected>--SELECT A CITY--</option>
                            <option value="kanjirappaly">kanjirappaly</option>
                            <option value="koovappaly">koovappaly</option>
                            <option value="erumely">erumely</option>
                            <option value="mundakayam">mundakayam</option>


                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="Bloodgrp">Blood Group</label>
                    </div>
                    <div class="col-75">

                        <select name="bloodgrp" id="c" style="width:100%;" required>
                            <option disabled selected>SELECT BLOOD GROUP</option>
                            <option value="A Positive">A Positive</option>
                            <option value="A Negative">A Negative</option>

                            <option value="B Positive">B Positive</option>
                            <option value="B Negative">B Negative</option>

                            <option value="AB Positive">AB Positive</option>
                            <option value="AB Negative">AB Negative</option>

                            <option value="O Positive">O Positive</option>
                            <option value="O Negative">O Negative</option>



                        </select>

                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="sbt_donor" value="Search">


                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function sub(){
       
 var a=document.getElementById('c');
 var b=document.getElementById('b');
 
if(b.selectedIndex <=0 || a.selectedIndex <=0){
    alert("Select all the fields");
    return false;
}else{
    //alert("Select all the fi");
    return true;
}
    }
</script>

@endsection