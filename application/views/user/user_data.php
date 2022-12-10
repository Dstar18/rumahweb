<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('_partials/head.php');?>
    </head> 
    
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            
            <!-- Top Navbar -->
            <?php $this->load->view('_partials/navbar.php');?>
            <!-- /Top Navbar -->

            <!-- Left Sidebar -->
            <?php $this->load->view('_partials/sidebar.php');?>
            <!-- /Left Sidebar -->
            
            <!-- Main Content -->
            <div class="content-wrapper">
            
            <!-- Breadcrumb -->
            <?php $this->load->view('_partials/breadcrumb.php');?>
            <!-- /Breadcrumb -->

                <section class="content">
                    <div class="card">
                        <!-- Navbar Content -->
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">USERS</h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <!-- /Navbar Content -->
                        <!-- Page Content -->
                        <div class="card-body">
                            <table id="tableUser" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataUser">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>   
            </div>
            <!-- /Main Content -->

            <!-- Footer -->
            <?php $this->load->view('_partials/footer.php');?>
            <!-- /Footer -->
        </div>

        <!-- JS -->
        <?php $this->load->view('_partials/js.php');?>

        <script>
$(document).ready(function(){

    var petugas = $('#petugas').text();
    console.log(petugas);

    getNewOrder();

    function getNewOrder(){
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('User/viewAll')?>",
            dataType : "JSON",
            success : function(data){

                // console.log(data);
                var html;
                var datax = data.data;
                // console.log(datax);
                var i;
                var n = 1;
                for(i=0; i<datax.length; i++){
                    console.log(datax[i].firstName);
                    html += "<tr>"+
                            "<td>"+ n++ +"</td>"+
                            "<td>"+datax[i].title+"</td>"+
                            "<td>"+datax[i].firstName+"</td>"+
                            "<td>"+datax[i].lastName+"</td>";
                            html += "<td style='text-align:center'>"+
                                    "<a href='<?=base_url('User/viewDetail/')?>"+datax[i].id+"'><button id='btn-detail' class='btn btn-info btn-sm'>Detail</button> </a>"+
                                    "<a href='<?=base_url('User/viewEdit/')?>"+datax[i].id+"'><button class='btn btn-warning btn-sm mr-1'>Edit</button></a>"+
                                    "<a href='<?=base_url('User/deleteUserID/')?>"+datax[i].id+"'><button class='btn btn-danger btn-sm'>Delete</button></a>";
                                    "</td></tr>";
                }
                $('#dataUser').html(html);
                $('#tableUser').DataTable({
                    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]]
                });
            }
        });
 
    }
    
    


});


</script>

        
        <!-- /JS -->
    </body>
</html>