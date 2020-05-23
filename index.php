<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Mail Server</title>
  </head>
  <body>
	<?php

	$connection = mysqli_connect('127.0.0.1', 'root', 'Letmein123!', 'mailserver');

	if(!$connection){echo "Database Connection Failed";}
	else{
		//echo "Database Connection Successful \n";
	}
	?>
	  <section>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Mail Server</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Users <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="domain.php">Domains</a>
		      </li>

		    </ul>
		  </div>
		</nav>
	  </section>
	  <section>
	  	<div class="container py-5">

			<div class="row">
				<div class="col-6 p-4">

					<h3>Register User</h3>

					<form class="py-5" method="post" action="add_user.php">
						<?php
						$sql = "SELECT id, name FROM virtual_domains";
						$result = $connection->query($sql);

				?>
					<div class="form-group">
					    <label for="exampleFormControlSelect1">Select Domain</label>
					    <select class="form-control" name="domain" id="exampleFormControlSelect1">
							  <?php
	  						if ($result->num_rows > 0) {
	  						  // output data of each row
	  						  while($row = $result->fetch_assoc()) {
								  $domain_id = $row["id"];

							  ?>
					      <option value="<?php echo htmlspecialchars($domain_id); ?>" ><?php echo $row["name"] ?></option>
  						<?php
    						  }
    						} else {
    						  echo "0 results";
    						}
  					    ?>
					    </select>
					  </div>

					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">

					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
					  </div>

					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
				<div class="col-6 p-4">

					<h3>Existing Users</h3>






<?php
						$sql = "SELECT id, email, domain_id FROM virtual_users";
						$result = $connection->query($sql);


?>






					<table class="table table-hover my-4">
					  <thead>
					    <tr>

					      <th scope="col">Email</th>
					      <th scope="col">Domain</th>
                <th scope="col">Action</th>

					    </tr>
					  </thead>
					  <tbody>
						  <?php
  						if ($result->num_rows > 0) {
  						  // output data of each row
  						  while($row = $result->fetch_assoc()) {


						  ?>
  					    <tr>

  					      <td><?php echo $row["email"] ?></td>
  					      <td><?php echo $row["domain_id"] ?></td>

                  <td>

                    <form method="post" action="delete_user.php">
                        <input type="number" name="user_id" value="<?php echo htmlspecialchars($row["id"]); ?>" hidden />
                        <input type="submit" name="test" id="test" value="Delete" /><br/>
                    </form>

                  </td>

  					    </tr>
						<?php
  						  }
  						} else {
  						  echo "0 results";
  						}
					    ?>


					  </tbody>
					</table>
				</div>
			</div>

			<?php




			mysqli_close($connection)
			?>


	  	</div>
	  </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
