@extends('layout_donor')


@section('content')

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="style/profile.css">
</head>

<body>

    <header id="header">
        <i class="fas fa-bars" id="nav-toggler"></i>

    </header>



    <div id="orderrequest">
        <form action="/registerdonor" class="orderform" method="POST" onsubmit="required()">
            @csrf
            <h1 class="text-center">Register As Donor</h1>
           
            <!-- Progress bar -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active" data-title="Address"></div>

                <div class="progress-step" data-title="Blood"></div>
            </div>

            @if(session()->has('message'))
   <div class="alert alert-success">
       {{ session()->get('message') }}
   </div>
@endif


            <!-- Pickup form -->
            <div class="form-step form-step-active">

                <div class="input-group">
                    <label for="pickuplocation"><b>Date Of Birth</b></label>
                    <input type="date" name="dob" id="dob" max="<?= date('Y-m-d'); ?>" placeholder="Enter your DOB" required />
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="input-group">

                    <fieldset>
                        <legend><label for="packagesize"><b>Are You taking any kind of medicine regularly</b></label></legend><span></span>
                        <label class="cont">Yes
                            <input type="radio" name="med" id="med" value="Yes" required>
                            <span class="check"></span>
                        </label>
                        <label class="cont">No
                            <input type="radio" name="med" id="med" value="No" required>
                            <span class="check"></span>
                        </label>
                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>
                </div>
                <div class="input-group">
                    <label for="pickuplocation"><b>Weight</b></label>
                    <input type="text" name="kg" id="kg" placeholder="Enter your Weight"onkeyup="return weight();" required />
                    
                    <span id="text-danger"></span>
                    

                </div>

                <div class="">
                    <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                </div>
            </div>

            <div class="form-step">
                <div class="input-group">


                    <fieldset>
                        <legend><label for="packagesize"><b>Gender</b></label></legend><span></span>
                        <label class="cont">Male
                            <input type="radio" name="gender" id="gen" value="Male" required>
                            <span class="check"></span>
                        </label>
                        <label class="cont">Female
                            <input type="radio" name="gender" id="gen" value="Female" required>
                            <span class="check"></span>
                        </label>
                        <label class="cont">Other
                            <input type="radio" name="gender" id="gen" value="Other" required>
                            <span class="check"></span>
                        </label>
                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>


                </div>
                <div class="input-group">


                    <fieldset>
                        <legend><label for="packagesize"><b>Are You interested to Donate Blood?</b></label></legend><span></span>
                        <label class="cont">Yes
                            <input type="radio" name="grole" id="donor" value="Yes">
                            <span class="check"></span>
                        </label>
                        <label class="cont">No
                            <input type="radio" name="grole" id="donor" value="No">
                            <span class="check"></span>
                        </label>
                        @error('title')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>


                </div>
                <div class="input-group">
                    <label for="packagesize"><b>Blood Group</b></label>
                    <select name="bloodgrp" id="bgrp" style="width:100%;" required>
                        <option value=" " disabled selected>SELECT BLOOD GROUP</option>
                        <option value="A Positive">A Positive</option>
                        <option value="A Negative">A Negative</option>

                        <option value="B Positive">B Positive</option>
                        <option value="B Negative">B Negative</option>

                        <option value="AB Positive">AB Positive</option>
                        <option value="AB Negative">AB Negative</option>

                        <option value="O Positive">O Positive</option>
                        <option value="O Negative">O Negative</option>

                    </select><span></span>
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <input type="submit" class="btn" id="pro" name="probtn" onclick="submitform()" value="Submit">

                </div>
            </div>

        </form>
    </div>
    </body>
    <!--SCRIPT BEGINS-->
    <script>
        
      
function weight(){
    //alert("jhjh");
let dv = document.getElementById('kg');
let span = document.getElementsByTagName('span');
           
           
            
            if (dv.value>=40) {
                
                span["text-danger"].innerText = "";
                span["text-danger"].style.color = '#28fc7a';
            } else {
                //alert("jhjh");
                span["text-danger"].innerText = "Not Eligible!!weight is below 40";
                span["text-danger"].style.color = 'red';
            }
        }
        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        function submitform() {
           ;
            var dob=getElementById('dob').value;
            var age=getAge(dob);
            alert(age);
            if(age>=18){
                return true;
            }else{
                return false;
            }

        }



        const nav_links = document.querySelectorAll(".nav__item-link");
        const sub_links = document.querySelectorAll(".sub_link");

        function collapse_nav(head, toggler, sidenav) {
            const header = document.getElementById(head);
            const nav_toggler = document.getElementById(toggler);
            const nav = document.getElementById(sidenav);

            nav_toggler.addEventListener("click", function() {
                this.classList.toggle("fa-times");
                nav.classList.toggle("collapse");
                header.classList.toggle("collapse-header");
            });
        }
        collapse_nav("header", "nav-toggler", "nav");
        nav_links.forEach((link) => {
            link.addEventListener("click", function() {
                nav_links.forEach((l) => {
                    if (l.classList.contains("active")) {
                        l.classList.remove("active");
                    }
                });

                this.classList.toggle("active");
                const sub_menu = this.nextElementSibling;
                if (sub_menu) {
                    sub_menu.classList.toggle("d-none");
                }
            });
        });

        sub_links.forEach((link) => {
            link.addEventListener("click", () => {
                sub_links.forEach((l) => l.classList.remove("active-sub-link"));
                link.classList.toggle("active-sub-link");
            });
        });

        //progress bar
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");
        let formStepsNum = 0;
        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });
        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                    formStep.classList.remove("form-step-active");
            });
            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });
            const progressActive = document.querySelectorAll(".progress-step-active");
            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }
    </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection