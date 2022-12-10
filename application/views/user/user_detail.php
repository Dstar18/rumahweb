<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_partialsLogin/head.php');?>
    </head>
    <body class="hold-transition login-page">
        <main class="main-content  mt-0">
            <section class="min-vh-100 mb-8">
                <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= base_url()?>/assetsLogin/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark opacity-6"></span>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 text-center mx-auto">
                                <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                                <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                            <div class="card z-index-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="firstName" value="<?=$dataxx->firstName?>" placeholder="firstName" aria-label="Name" aria-describedby="email-addon" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="lastName" value="<?=$dataxx->lastName?>"  placeholder="lastName" aria-label="Name" aria-describedby="email-addon" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="email" value="<?=$dataxx->email?>"  placeholder="Email" aria-label="Email" aria-describedby="email-addon" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <input type="password" class="form-control" name="password" value="<?=$dataxx->password?>"  placeholder="Password" aria-label="Password" aria-describedby="password-addon" required> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- JS -->
        <?php $this->load->view('_partialsLogin/js.php');?>
        <script>
$(document).ready(function(){

    var petugas = $('#petugas').text();
    console.log(petugas);

    getNewOrder();

    function getNewOrder(){
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('User/viewEdit')?>",
            dataType : "JSON",
            success : function(data){

                // console.log(data);
                var html;
                var datax = data.data;
                // console.log(datax);
                var i;
                var n = 1;
                
            }
        });
 
    }
    
    


});


</script>

        <!-- /JS -->
    </body>
</html>