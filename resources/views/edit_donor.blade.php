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
        <x-auth-session-status style="color:red;" class="mb-4" :status="session('message')" />
            <form action="/edit_ddon" method="POST" onsubmit="return sub()">
                @csrf
                <div class="row">
                    <div class="col-25">
                        <label for="City">Weight</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="weight" id="weight" placeholder="Enter your weight" style="width:100%;"
                            onkeyup="return weight1()" required />
                        <span id="text-danger"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="City">Taking Medicine Regularly</label>
                    </div>
                    <div class="col-75"><label class="cont">Yes
                            <input type="radio" name="med" id="med" value="Yes" required>
                            <span class="check"></span>
                        </label><label></label>
                        <label class="cont" style="padding:1em;">No
                            <input type="radio" name="med"  value="No" required>
                            <span class="check"></span>
                        </label>
                    </div>
                </div>



                <div class="row">
                    <div class="col-25">
                        <label for="City">Intersted to Donate Blood</label>
                    </div>
                    <div class="col-75"><label class="cont">Yes
                            <input type="radio" name="dc" value="Yes" required>
                            <span class="check"></span>
                        </label><label></label>
                        <label class="cont" style="padding:1em;">No
                            <input type="radio" name="dc" id="dc" value="No" required>
                            <span class="check"></span>
                        </label>
                    </div>
                </div>



                <div class="row">
                    <input type="submit" name="sbt_donor" value="Submit">


                </div>
            </form>
        </div>
    </div>
</body>
<script>
function sub() {

   ;
    var med = document.getElementById('med');
    
    var donor = document.getElementById('dc');
    
    var status;
    if (med.checked) {
        alert("Due to taking medicine ,You cant Donate Blood!!");

    } else {
        //alert("Select all the fi");
        status = true;
    }
    //alert("ggu");
    if (donor.checked) {
        alert("You cant Donate Blood Any More!!");

    } else {
        //alert("Select all the fi");
        status = true;
    }
    
    
        return true;
   

}

function weight1() {
    // alert("ujgu");
    let span = document.getElementsByTagName('span');

    var b = document.getElementById('weight');


    if (b.value >= 40) {

        span["text-danger"].innerText = "";
        span["text-danger"].style.color = '#28fc7a';
    } else {
        //alert("jhjh");
        span["text-danger"].innerText = "Not Eligible!!weight is below 40";
        span["text-danger"].style.color = 'red';
    }
}
</script>

@endsection