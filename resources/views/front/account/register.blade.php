@extends('front.layouts.app')

@section('main')
     <!-- Single Page Header start -->
     <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Register</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Register</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


   <!-- Register Start -->
   <div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
        <div class="col-lg-12">
        <?php    
        if(isset($_SESSION['message'] )){
            echo "<div class='alert alert-danger text-center mb-2'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
        ?>
                    <form action="" class="row g-3 mt-2" method="post" name="registrationForm" id="registrationForm">
                        <div class="row">
                        <div class="col-md-6">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="name" id="name" placeholder="Your Name" onkeypress="return isNumberKey(event)">
                        </div>
                        <div class="col-md-6">
                        <input type="number" class="w-100 form-control border-0 py-3 mb-4" name="mobile" id="mobile" placeholder="Enter Your Number">
                        </div>
                        <div class="col-md-12">
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" name="address" id="address" placeholder="Enter Your Address">
                        </div>
                        <div class="col-md-6">
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" name="email" id="email" placeholder="Enter Your Email">
                        </div>
                        <div class="col-md-6">
                        <input type="number" class="w-100 form-control border-0 py-3 mb-4" name="pin" id="pin" placeholder="Enter Your Pin">
                        </div>
                        <div class="col-md-6">
                        <input type="password" class="w-100 form-control border-0 py-3 mb-4" name="pass" id="pass" placeholder="Enter Your Password">
                        </div>
                        <div class="col-md-6">
                        <input type="password" class="w-100 form-control border-0 py-3 mb-4" name="cpass" id="cpass" placeholder="Enter Your Confirm Password">
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="w-50 btn form-control border-secondary py-3 bg-white text-primary" id="register_btn" type="submit">Register</button>
                        </div>
                        <span class="text-center">Already have an account! <b><a href="login.php">Login</a></b></span>
                    </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
<!-- Register End -->
@endsection

@section('customJs')
    <script type="text/javascript">
$('#registrationForm').submit(function(e){
    e.prevetDefault();

    $.ajax({
        url:"{{ route('account.processregister') }}",
        type:'post'
        data:$(this).serializeArray()
        datatype:'json'
        success:function(response){

        }error: function(jQXHR, exception){
            console.log("Something went wrong");
            
        }
        
    });
});
    </script>
@endsection