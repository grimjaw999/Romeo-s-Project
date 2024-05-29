<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View</title>
</head>
<body>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User's Information
                        <a href="admin_page.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['view']))
                    {

                        $id = mysqli_real_escape_string($conn, $_GET['view']);
                        $query = "SELECT * FROM products WHERE id='$id'";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $row = mysqli_fetch_array($query_run);
                            ?>

                            <div class="mb-3">
                                <label>Name</label>
                                <p class="form-control">
                                    <?=$row['name'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Stocks</label>
                                <p class="form-control">
                                    <?=$row['stock'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <p>
                                    <img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                </p>
                            </div>

                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
