<?php session_start();?>
<!doctype html>
<html lang="en">

<head>
    <title>Home-Work-6</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="title-background">
        <div class="container-fluid">
            <nav class="nav navbar-expand-lg navbar-light">
                <a href="" class="navbar-brand">
                    <img src="image/PSU_CoC.png" alt="Logo">
                </a>
                <span class="navbar-text">
                    <h3 class="titleheading">Employee </h3>
                </span>
                <?php 
                    if(!isset($_SESSION["name"])) {

                ?>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#modalLogin">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#modalSignup">SignUp</a>
                    </li>
                </ul>

                <?php 
                    }else{

                ?>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" id="book">Book </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"><?php echo  $_SESSION["name"] ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
                <?php 
                    }
                ?>
            </nav>
        </div>
    </div>

    <!-- User List -->
    <div class="userlist" id="userlist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12"></div>
                <?php 

                    if(isset($_SESSION['name']))
                    {

                    
                ?>
                <table class="table table-striped">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('functions.php');
                            $fetchusers = new DB_con();

                            $sql = $fetchusers->users();
                            $num_row =0;
                            while($row =mysqli_fetch_array($sql))
                            {
                                $num_row++;
                            if($num_row %2 ==0)
                            {

                                 
                        ?>

                        <tr>
                            <th scope="row"><?php echo $num_row?></th>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                        </tr>

                        <?php
                            }else{
                                ?>
                        <tr class="table-light">
                            <th scope="row"><?php echo $num_row?></th>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                        </tr>
                        <?php 
                            }
                            ?>

                    </tbody>
                    <?php
                    }
                ?>
                </table>
                <?php 
                        }
                    ?>
            </div>
        </div>
    </div>

    <!-- Modal Books  -->
    <div class="modal fade" id="bookmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="frmbook" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Books</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bookmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtisbn" placeholder="ISBN" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnamebook" placeholder="Book Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="file" id="uploadimage" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtatname" placeholder="Author Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnis" placeholder="Number in Stock"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtprice" placeholder="Price" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- modal SignUp -->

    <div class="modal fade" id="modalSignup">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="frmSignup">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="signupmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtname" placeholder="Fullname" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtus" placeholder="Username" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txtps" placeholder="Password" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="signmodalFooter">
                        <button type="submit" class="btn btn-success" value="Submit">Submit</button>
                        <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Books edit -->
    <div class="modal fade" id="modalbookedit" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="post" id="frmbookedit" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title edittext" id="exampleModalLabel">Edit Book </h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bookeditmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control " id="isbn" name="txtisbn" placeholder="ISBN"
                                    value="" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="name" name="txtnamebook"
                                    placeholder="Book Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="hidden" class="form-control" id="image" name="image"
                                    placeholder="image Name">
                                <p id="img-edit">asdasd</p>
                                <input type="file" id="uploadimage" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="author" name="txtatname"
                                    placeholder="Author Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="stock" name="txtnis"
                                    placeholder="Number in Stock">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="price" name="txtprice" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookeditmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="Edit_re">Update</button>
                        <input type="hidden" class="" id="user_id" value='' name="user_id">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal Login -->

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" id="frmLogin">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="loginmodalBody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtus" placeholder="Username" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="txtps" placeholder="Password" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="loginmodalFooter">
                        <button type="submit" class="btn btn-success">Login</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- model delete  -->
    <div class="modal fade" id="modalbookdelete" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Book </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="bookdeletemodalbody">
                   <p> Are you sure want to delete ?</p>
                    <p class="text-warning">This action cannot be undo. </p>
                </div>
                <div class="modal-footer" id="bookdeletemodalfooter">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_re">Delete</button>
                    <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                </div>
            </div>
        </div>
    </div>

    <!-- Book list -->
    <div class="Booklist" id="booklist">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mt-2 d-flex align-items-center ">
                    <h5>List of Books</h5>
                </div>
                <div class="col-sm-6 d-flex justify-content-end d-flex align-items-center ">
                    <button class="btn btn-success mt-5 d-flex align-items-center" data-toggle="modal"
                        data-target="#bookmodal"><i class="fa fa-plus-square pr-2" aria-hidden="true"></i> Add New Books </button>
                        
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ISBN</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">In Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                
                include_once('functions.php');
                $fetchdata = new DB_con();

                $sql = $fetchdata->fetchdata();
                
                while($row = mysqli_fetch_array($sql))
                {

                
            ?>
                            <tr>
                                <td class="isbn"><?php echo $row['isbn']; ?> </td>
                                <td class="name"><?php echo $row['name']; ?> </td>
                                <td class="image" style="display:none"><?php echo $row['image']; ?> </td>
                                <td class="author"><?php echo $row['author']; ?> </td>
                                <td class="stock"><?php echo $row['in_stock']; ?> </td>
                                <td class="price"><?php echo $row['price']; ?> </td>

                                <td>
                                    <i class="fa fa-eye detail" data-toggle="modal" data-target="#modalbookdetail"
                                        aria-hidden="true" id="<?php  echo $row['user_id']?>"></i>
                                    <i class="fa fa-pencil edit" data-toggle="modal" data-target="#modalbookedit"
                                        aria-hidden="true" id="<?php  echo $row['user_id']?>"></i>
                                    <i class="fa fa-trash Del_ID" name="Del_ID" value="<?php echo $row['user_id']?>"
                                        aria-hidden="true"></i>
                                    <!-- <button data-toggle="modal" data-target="#modalbookdetail" class="btn btn-success detail "id="<?php  echo $row['user_id']?>">Detail</button> 
                                <button class="btn btn-success edit" data-toggle="modal" data-target="#modalbookedit" id="<?php  echo $row['user_id']?>">Edit</button> 
                                <button class="btn btn-success Del_ID" name="Del_ID" value="<?php echo $row['user_id']?>">Delete</button> -->
                                </td>

                            </tr>
                            <?php
                }
            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Books detail -->
    <div class="modal fade" id="modalbookdetail" tabindex="-1" role="dialog" aria-labelledby="modalLogin"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title detailtext" id="exampleModalLabel">Detail Book </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="bookdetailmodalbody">
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered col">
                                <tbody>
                                    <tr>
                                        <th scope="col-4">
                                            <p class="font-weight-normal">ISBN</p>
                                        </th>
                                        <th scope="col-4">
                                            <p class="font-weight-normal isbn-id"> </p>
                                            </h6>
                                        </th>
                                        <th scope="col" rowspan="5">
                                            <p class="font-weight-normal  d-flex justify-content-center " id="img"> </p>
                                            </h6>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">
                                            <p class="font-weight-normal">NAME</p>
                                        </th>
                                        <th scope="col">
                                            <p class="font-weight-normal name-id"> </p>
                                            </h6>
                                        </th>

                                    </tr>
                                    <tr>
                                        <th scope="col">
                                            <p class="font-weight-normal">Author</p>
                                        </th>
                                        <th scope="col">
                                            <p class="font-weight-normal author-id"> </p>
                                            </h6>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">
                                            <p class="font-weight-normal">In Stock</p>
                                        </th>
                                        <th scope="col">
                                            <p class="font-weight-normal stock-id"> </p>
                                            </h6>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">
                                            <p class="font-weight-normal">Price</p>
                                        </th>
                                        <th scope="col">
                                            <p class="font-weight-normal price-id"> </p>
                                            </h6>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal-footer" id="bookdetailmodalfooter">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        console.log("Ready Faction!!");
        $('#booklist').hide();

        $('.Del_ID').click(function(e) {
            e.preventDefault();
            console.log("DELTE");
            var Delete_ID = $(this).attr('value');
            console.log(Delete_ID);
            $('#modalbookdelete').modal('show');

            $('#delete_re').click(function(e) {
                console.log("dddd");

                $.ajax({
                    url: 'delete.php',
                    method: 'post',
                    // การใส่ data แบบระบุตัวแปล $_POST['Del_ID']
                    data: {
                        Del_ID: Delete_ID
                    },
                    success: function(data) {
                        console.log(data);
                        $("#bookdeletemodalbody").html(data);
                        var btnClose =
                            ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                        $("#bookdeletemodalfooter").html(btnClose);
                    }
                });
            });

        });

        $('#frmbook').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#bookmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookmodalfooter").html(btnClose);
                },
                error: function(e) {
                    console.log(error);
                }
            });
        });

        $('.edit').click(function(e) {
            e.preventDefault();
            console.log("edit");

            $ISBN = $(this).closest("tr").find('.isbn').text();
            $NAME = $(this).closest("tr").find('.name').text();
            $IMG = $(this).closest("tr").find('.image').text();
            $AUTHOR = $(this).closest("tr").find('.author').text();
            $IN_STOCK = $(this).closest("tr").find('.stock').text();
            $PRICE = $(this).closest("tr").find('.price').text();

            // $('.isbn-id').text($ISBN);
            $('.name-id').text($NAME);
            $('.img-id').text($IMG);
            $('.author-id').text($AUTHOR);
            $('.stock-id').text($IN_STOCK);
            $('.price-id').text($PRICE);

            $key = $(this).attr('id');
            console.log($key);
            $('#isbn').val($ISBN);
            $('#name').val($NAME);
            $('#image').val($IMG);
            $('#author').val($AUTHOR);
            $('#stock').val($IN_STOCK);
            $('#price').val($PRICE);

            $key = $(this).attr('id');
            $('#user_id').val($key);

            var number = $IMG;
            $("#img-edit").html("<img class='img' src='uploads/" + $.trim(number) +
                "' width=30%' </img>");
                $(".edittext").html("<h5 modal-title edittext > Edit Book: " + $ISBN +" </h5>");
            

        });

        $('#frmbookedit').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "update.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#bookeditmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookeditmodalfooter").html(btnClose);
                },
                error: function(e) {
                    console.log(error);
                }
            });
        });



        $("#frmLogin").submit(function() {
            console.log("Submit Pass")
            event.preventDefault();
            $.ajax({
                url: "login.php",
                type: "POST",
                data: $('form#frmLogin').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#loginmodalBody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#loginmodalFooter").html(btnClose);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });

        $("#frmSignup").submit(function() {
            console.log("Submit Pass")
            event.preventDefault();
            $.ajax({
                url: "signup.php",
                type: "POST",
                data: $('form#frmSignup').serialize(),
                success: function(data) {
                    console.log("data:" + data);
                    $("#signupmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#signmodalFooter").html(btnClose);
                },
                error: function(data) {
                    console.log('An error occurred.');
                    console.log(data);
                }
            });
        });

        $('#book').click(function() {
            console.log("book");
            $('#userlist').toggle();
            $('#booklist').toggle();
        });

        $('.detail').click(function(e) {
            e.preventDefault();
            console.log("detail");
            $key = $(this).attr('id');
            $('#userdetail_id').val($key);

            $ISBN = $(this).closest("tr").find('.isbn').text();
            $NAME = $(this).closest("tr").find('.name').text();
            $IMG = $(this).closest("tr").find('.image').text();
            $AUTHOR = $(this).closest("tr").find('.author').text();
            $IN_STOCK = $(this).closest("tr").find('.stock').text();
            $PRICE = $(this).closest("tr").find('.price').text();

            console.log($ISBN);
            console.log($NAME);
            console.log($IMG);
            console.log($AUTHOR);
            console.log($IN_STOCK);
            console.log($PRICE);

            // set attribute

            $('.isbn-id').text($ISBN);
            $('.name-id').text($NAME);
            $('.img-id').text($IMG);
            $('.author-id').text($AUTHOR);
            $('.stock-id').text($IN_STOCK);
            $('.price-id').text($PRICE);

            var number = $IMG;
            $("#img").html("<img class='img' src='uploads/" + $.trim(number) +
                "' width=50%' </img>");
            $(".detailtext").html("<h5 modal-title edittext > Edit Book: " + $ISBN +" </h5>");
        });

        $(function() {
            $("#modalLogin, #modalSignup, #bookmodal, #modalbookedit, #modalbookdelete").on("hidden.bs.modal",
        function() {
                location.reload();
            });
        });



    });
    </script>
</body>

</html>