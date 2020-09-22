<?php
include './dbcon.php';

if(isset($_POST['submitcatagory']))
{
	
	$catagory_name=$_POST['catagory_name'];
	 
		 
	$i="INSERT INTO catagory (catagory_name)VALUES('$catagory_name')";

	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('catagory_name inserted successfully!!!')</script>";
	}
	else {
		echo " Error!!NOT inserted! ! !";
	}

}?>
<!-- <script type='text/javascript'>alert('')</script> -->

<!-- Head -->
<!-- ---------------------------- -->
 <?php include'heading.php'; ?>
<!-- ---------------------------- -->
<!-- ---------------------------- -->
<!-- INput Page      -->

	<div class="picdiv row mt-4 mb-4 bg-tcolor" id="gallary"  >
	  <div class="col-md-10 offset-md-1">

    	<h1 class="m-2 p-3 text-white text-center display-1" style="box-shadow: 10px;">Input Page</h1>

   	  </div>
   </div>
<!-- INput Page      -->

    <!-- CAtagory input -->
    <div class="row mt-4 border border-top-dark">
		<div class="col-md-6">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">Input Catagory </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<form class="form" method="POST"  enctype="multipart/form-data">
						<input class="m-2 p-2 form-control form-control-lg" type="text" name="catagory_name" placeholder="New Catagory">
						<input type="submit" value="Input New Catagory" class="m-2 p-2 btn btn-outline-dark" name="submitcatagory">
				  		
				  	</form>
				  </div>
			</div>
		</div>

		<div class="col-md-6">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">Catagories </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<!--  -->
				  	<table class="table table-responsive table-hover table-secondary">
                        <thead>
                          <tr>
                            <th scope="col">SL. no.</th>
                            <th scope="col"> Catagories </th>
                          </tr>
                        </thead>
				  	<?php 
				  		$query= "SELECT*FROM catagory ORDER BY catagory_name ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            $no=1;
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
				  	 ?>

						  <tr>
                            <th scope="col"><?php echo $no; ?></th>
                            <th scope="col"> <?php echo $row['catagory_name']; ?> </th>
                          </tr>

				  	 <?php
				  	 $no+=1 ;
				  	 } 
				  	} ?>
				  	<!--  -->
				  </table>
				  </div>
			</div>
		</div>
	</div>
      <!-- CAtagory input -->

      <!-- item input -->
    <div class="row mt-4 border border-top-dark">
		<div class="col-md-6">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">Input ITEMS Here  </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<!-- `item`(`item_id`, `item_img1`, `item_img2`, `item_img3`, `item_name`, `item_type`, `item_value`, `item_origin`, `item_description`) -->
				  	<form class="form" method="POST"  enctype="multipart/form-data">
					<input class="m-2 p-2 form-control form-control-lg" type="text" name="item_name" placeholder="Item Name">
					<input class="m-2 p-2 form-control form-control-lg" type="text" name="item_type" placeholder="Type Note/coin/Antique">
					<input class="m-2 p-2 form-control form-control-lg" type="text" name="item_value" placeholder="Item's value">
					<input class="m-2 p-2 form-control form-control-lg" type="text" name="item_origin" placeholder="Country/Origin">
					<label class="m-2 p-2 lead">Description:</label>
					<textarea class="m-2 p-2 form-control form-control-lg"type="text" name="item_description" placeholder="">
						
					</textarea>
						<input type="submit" value="Input New Catagory" class="m-2 p-2 btn btn-outline-dark" name="submitcatagory">
				  		
				  	</form>
				  </div>
			</div>
		</div>

		<div class="col-md-6">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">ITEMS </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<!--  -->
				  	<table class="table table-responsive table-hover table-secondary">
                        <thead>
                          <tr>
                            <th scope="col">SL. no.</th>
                            <th scope="col"> Catagories </th>
                          </tr>
                        </thead>
				  	<?php 
				  		$query= "SELECT*FROM item ORDER BY item_name ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            $no=1;
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
				  	 ?>

						  <tr>
                            <th scope="col"><?php echo $no; ?></th>
                            <th scope="col"> <?php echo $row['']; ?> </th>
                            <th scope="col"> <?php echo $row['']; ?> </th>
                            <th scope="col"> <?php echo $row['']; ?> </th>
                            <th scope="col"> <?php echo $row['']; ?> </th>
                            <th scope="col"> <?php echo $row['']; ?> </th>
                            <th scope="col"> delete </th>
                          </tr>

				  	 <?php
				  	 $no+=1 ;
				  	 } 
				  	} ?>
				  	<!--  -->
				  </table>
				  </div>
			</div>
		</div>
	</div>      
      <!-- item input -->








<!-- ------------------------- -->
 <!-- foot -->           
<!-- ---------------------------- -->
 <?php include'foot.php'; ?>
<!-- ---------------------------- -->
    

