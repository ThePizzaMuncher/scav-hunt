<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TESTING</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Testing </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="post">
					<table border='1' cellpadding='10' width='100%'>
						<tr>
							<td> <strong>naam: </strong></td>
							<td> <input type='text' name='naam' value='' />*</td>
						</tr>
						<tr>
                        <div class="input-group mb-3">
                            <input type="text" name="search" required value="<?php if(isset($_POST['submit'])){echo $_POST['search']; } ?>" class="form-control" placeholder="Search data">
                        <div>
						</tr>
						<tr>
							<td> <strong>wachtwoord: </strong></td>
							<td> <input type='text' name='wachtwoord' value='' />*</td>
						</tr>
						<tr>
							<td> <strong>Admin: </strong></td>
							<td> <input type='checkbox' name='isAdmin' /></td>
						</tr>

					</table>
					<p>* required</p>
					<input type='submit' name='submit' value='submit'>
				</div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                <?php 
                                // connect to the database
	                                require '../assets/includes/conn.php';
                                    if(isset($_POST['submit']))
                                    {
                                        $filtervalues = $_POST['search'];
                                        $query = "SELECT * FROM opleiding WHERE CONCAT(opleiding_naam) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['ID']; ?></td>
                                                    <td><?= $items['opleiding_naam']; ?></td>
                                                </tr>
                                                <?php
                                                 // get form data, making sure it is valid
                                        $naam = mysqli_real_escape_string($conn, $_POST['naam']);
                                        $opleiding = $items['ID'];
                                        $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
                                        $isAdmin = (isset($_POST['isAdmin']) ? 1 : 0);
                                            // save the data to the database
                                
                                            $sql_query = "INSERT INTO docent (naam, opleiding_ID, wachtwoord,isAdmin) VALUES ('$naam', '$opleiding', '$wachtwoord','$isAdmin')";
                                
                                
                                            $retval = mysqli_query($conn, $sql_query);
                                
                                            if (!$retval) {
                                                die('Could not enter data: ');
                                            }
                                
                                            echo "Entered data successfully\n";
                                            header("Location: index.php");
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                
                                        ?>
                                
                            </tbody>
                        </table>
                    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>