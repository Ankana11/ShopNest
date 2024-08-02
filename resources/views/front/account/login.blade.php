@extends('front.layouts.app')

@section('main')
     <!-- Single Page Header start -->
     <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Login</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
         
            <li class="breadcrumb-item active text-white">Login</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Register Start -->
         
    <div class="container-fluid contact py-5 ">
        <div class="container py-5">
      
            <div class="p-5 bg-light rounded">
            <?php    
            if(isset($_SESSION['message'] )){
                echo "<div class='alert alert-info text-center mb-2'>" . $_SESSION['message'] . "</div>";
                unset($_SESSION['message']);
            }
            ?>
                <div class="col-lg-12 d-flex justify-content-center">
                
                    <form action="" class="row g-3 mt-2" method="post">
                        <div class="row ">
                            <div class="col-md-12">
                                <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email" name="email" id="email">
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password" name="pass" id="pass">
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <button class="w-50 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Login</button>
                             
                            </div>
                            <span class="text-center">Don't have an account! <b><a href="register.php">Register</a></b></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Register End -->

@endsection