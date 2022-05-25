@extends('admin_layout')


@section('content')

<div class="outer">

        <div class="row6">


            <div class="column6">
                <div class="card6">
                    <h1>Users</h1>
                    <p><?php
                     $con = mysqli_connect("localhost","root","","finaldb");
                        $sql = mysqli_query($con, "SELECT * FROM `users`");
                        $rows = mysqli_num_rows($sql);
                        echo $rows;
                        ?></p>

                </div>
            </div>

            <div class="column6">
                <div class="card6">
                    <h1>Donors</h1>
                    <p><?php
                        $sql1 = mysqli_query($con, "SELECT * FROM `tbl_donor`");
                        $rows1 = mysqli_num_rows($sql1);
                        echo $rows1;
                        ?></p>
                </div>
            </div>

            <div class="column6">
                <div class="card6">
                    <h1>Ambulance</h1>
                    <p><?php
                        $sql2 = mysqli_query($con, "SELECT * FROM `tbl_ambu`");
                        $rows2 = mysqli_num_rows($sql2);
                        echo $rows2;
                        ?></p>
                </div>
            </div>
            <div class="column6">
                <div class="card6">
                    <h1>Fuel Buddies</h1>
                    <p><?php
                        $sql3 = mysqli_query($con, "SELECT * FROM `tbl_fuel`");
                        $rows3 = mysqli_num_rows($sql3);
                        echo $rows3;
                        ?></p>
                </div>
            </div>

            <div class="column6">
                <div class="card6">
                    <h1>Ready Repair</h1>
                    <p><?php
                        $sql4 = mysqli_query($con, "SELECT * FROM `tbl_repair`");
                        $rows4 = mysqli_num_rows($sql4);
                        echo $rows4;
                        ?></p>
                </div>
            </div>

            <div class="column6">
                <div class="card6">
                    <h1>Total Users</h1>
                    <p><?php
                       $rows5=$rows4 + $rows3 + $rows2 + $rows1 +$rows;
                        echo $rows5;
                        ?></p>
                </div>
            </div>
        </div>


</div>  

@endsection