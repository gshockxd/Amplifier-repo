<?php $title='Service/Performer Registration' ?>
<?php require '../inc/header-no-navbar.php'; ?>
    <div class="container py-3">
        <div>
            <p class="h2">Registration Form (Personal)</p>
            <?php require 'inc/merge-register-nav.php'; ?>
        
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="row mt-5">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" name="fname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" name="lname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        
                    </div>
                    <div class="col-sm">
                        <div class="form-group col-sm-12">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="cnumber" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        </div>
                        
                        <div class="col-sm-12">
                            <label for="">Type of Service</label>
                            <select class="form-control">
                                <option selected disabled>-----------------------</option>
                                <option value="1">ok!</option>
                            </select>
                        </div>

                        <div class="mt-3 col-sm-6">
                            <label for="">Add Profile Picture</label>                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label  class="custom-file-label" for="customFile">Choose Photo</label>
                            </div>
                        </div>

                        <div class="row py-3 d-flex justify-content-end">       
                             <a href="description.php" class="btn btn-outline-secondary ml-3">Previous</a>
                             <a href="portfolio.php" class="btn btn-outline-primary ml-3">Next</a>
                             <?php require 'inc/merge-register-button.php' ?>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require '../inc/footer.php'; ?>