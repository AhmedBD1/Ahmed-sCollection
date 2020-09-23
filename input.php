<?php
include './dbcon.php';
//item edit
error_reporting(0);
if(isset($_POST['itemedit']))
{
//<!-- `item`(`item_id`, `item_img1`, `item_img2`, `item_img3`, `item_name`, `item_type`, `item_value`, `item_origin`, `item_description`) -->
	$item_id=$_POST['item_id'];
	// $item_name=$_POST['item_name'];
	$item_type=$_POST['item_type'];
	$item_value=$_POST['item_value'];
	$item_origin=$_POST['item_origin'];
	$item_description=$_POST['item_description'];
	// $item_img1="";
	// $item_img2="";
	// $item_img3="";

	 
	$i="UPDATE item SET item_type='$item_type',item_value='$item_value',item_origin='$item_origin',item_description='$item_description' WHERE item_id='$item_id'";

	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('Item Updated successfully!!!')</script>";
	}
	else {
		echo " Error!!ITEM NOT Updated ! ! !";
	}

}

//item Delete
if (isset($_POST['delete'])) {
	$item_id=$_POST['item_id'];

	$i="DELETE FROM item WHERE item_id='$item_id'";
	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('Items Deleted successfully..!')</script>";
	}
	else {
		echo "<script type='text/javascript'>alert('Items NOT Deleted! ! ! Error!!!')</script>";
	}
}

//delete catagory
if (isset($_POST['deletecatagory'])) {
	$catagory_id=$_POST['catagory_id'];

	$i="DELETE FROM catagory WHERE catagory_id ='$catagory_id'";
	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('catagory is Deleted successfully..!')</script>";
	}
	else {
		echo "<script type='text/javascript'>alert('catagory is NOT Deleted! ! ! Error!!!')</script>";
	}
}

//setitemcatagory
if(isset($_POST['setitemcatagory']))
{
	
	$catagory_name=$_POST['catagory_name'];
	$item_name=$_POST['item_name'];
	 
	//fetch item_id from item table
	$query= "SELECT item_id FROM item WHERE item_name='$item_name' ";
	$result= mysqli_query($con, $query);
	$data= mysqli_fetch_assoc($result);
	$item_id=$data['item_id'];

	echo "item_id:".$item_id."  item_name: ".$item_name. "  catagory_name: ".$catagory_name;
		 
	$i="INSERT INTO item_catagory_ref (catagory_name,item_id,item_name)VALUES('$catagory_name','$item_id','$item_name')";

	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('Item Catagory is set & inserted successfully!!!')</script>";
	}
	else {
		echo " Error!!NOT inserted! ! !";
	}

}

//input Items
if(isset($_POST['submititem']))
{
//<!-- `item`(`item_id`, `item_img1`, `item_img2`, `item_img3`, `item_name`, `item_type`, `item_value`, `item_origin`, `item_description`) -->
	
	$item_name=$_POST['item_name'];
	$item_type=$_POST['item_type'];
	$item_value=$_POST['item_value'];
	$item_origin=$_POST['item_origin'];
	$item_description=$_POST['item_description'];
	$item_img1="";
	$item_img2="";
	$item_img3="";

	if($_FILES['item_img1']['name'])
	{
	move_uploaded_file($_FILES['item_img1']['tmp_name'], "./img/".$_FILES['item_img1']['name']);
	$item_img1="./img/".$_FILES['item_img1']['name'];
	}
	if (!empty($_FILES['item_img2'])) {
		if($_FILES['item_img2']['name'])
		{
		move_uploaded_file($_FILES['item_img2']['tmp_name'], "./img/".$_FILES['item_img2']['name']);
		$item_img2="./img/".$_FILES['item_img2']['name'];
		}
	}
	
	if (!empty($_FILES['item_img3'])) {
		if($_FILES['item_img3']['name'])
		{
		move_uploaded_file($_FILES['item_img3']['tmp_name'], "./img/".$_FILES['item_img3']['name']);
		$item_img3="./img/".$_FILES['item_img3']['name'];
		}
	}
	
	 
		 
	$i="INSERT INTO item (item_name, item_type, item_value, item_origin, item_description,item_img1,item_img2,item_img3 ) VALUES ('$item_name', '$item_type', '$item_value', '$item_origin', '$item_description', '$item_img1', '$item_img2', '$item_img3')";

	if(mysqli_query($con, $i))
	{
	echo "<script type='text/javascript'>alert('Item inserted successfully!!!')</script>";
	}
	else {
		echo " Error!!ITEM NOT inserted ! ! !";
	}

}
//input CATAGORY
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

}

?>
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
						<input type="submit" value="Input New Catagory" class="m-2 p-2 btn btn-outline-dark btn-block" name="submitcatagory">
				  		
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
                            <th>
                            	<form method="POST">
                            		<input type="hidden" name="catagory_id" value="<?php echo $row['catagory_id']; ?>">
                        			<input type="submit" name="deletecatagory" class="btn btn-outline-danger" value="Delete Catagory" >
                            	</form>
                            </th>
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
					<textarea class="m-2 p-2 form-control form-control-lg"type="text" name="item_description" placeholder=""></textarea>
					<div class="form-group">
			    				
			    				<label  >Image 1</label>
							
								<input class="form-control form-control-lg" type="file" name="item_img1">
								<label  >Image 2</label>
								<input class="form-control form-control-lg" type="file" name="item_img2">
								<label  >Image 3</label>
								<input class="form-control form-control-lg" type="file" name="item_img3">
							
							</div>
					
						<input type="submit" value="Input New Item" class="m-2 p-3 btn btn-lg btn-outline-dark btn-block" name="submititem">
				  		
				  	</form>
				  </div>
			</div>
		</div>

		<!-- add an item to catagory -->
		<div class="col-md-6">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">Add Item to a Catagory </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<form class="form" method="POST"  enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="catagory_name">Choose Catagory name</label>
						    <select class="form-control" id="catagory_name" name="catagory_name">
						    	<?php 
				  				$query= "SELECT*FROM catagory ORDER BY catagory_name ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
							  	 ?>

									 
						      		<option><em><?php echo $row['catagory_name']; ?></em></option>

							  	 <?php
							  	 } 
							  	} ?>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="item_name">Item</label>
						    <select class="form-control" id="item_name" name="item_name">
						    	<?php 
				  				$query= "SELECT*FROM item ORDER BY item_name ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
							  	 ?>

									 
						      		<option value="<?php echo $row['item_name']; ?>"><em><?php echo $row['item_name']; ?></em></option>

							  	 <?php
							  	 } 
							  	} ?>
						    </select>
						  </div>
						<input type="submit" value="Set Item Catagory" class="m-2 p-2 btn btn-outline-dark btn-block" name="setitemcatagory">
				  	</form>
				  </div>
			</div>
		</div>
		<!-- add an item to catagory -->


		<div class="col-md-12 text-center">
			<!-- catagories -->
			<div class="card">

			  <div class="card-header bg-tcolor">
	    		<h3 class="text-white text-center">ITEMS </h3>
			  </div>
				  <div class="card-body m-2 border gallaryitems" >
				  	<!--  -->
				  	<table class="table  table-hover table-light">
                        <thead class="">
                          <tr>
                            <th scope="col"> SL. </th>
                            <th scope="col"> Item Name </th>
                            <th scope="col"> Images </th>
                            <th scope="col"> Details </th>
                            <th scope="col"> Edit/Delete </th>
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
				  	<!-- `item`(`item_id`, `item_img1`, `item_img2`, `item_img3`, `item_name`, `item_type`, `item_value`, `item_origin`, `item_description`) -->

                            <th scope="col"><?php echo $no; ?></th>
                            <th scope="col"> <?php echo $row['item_name']; ?> </th>
                            <th scope="col">
                            	
                            	<img class="img-thumbnail" width="180" height="70" src="<?php echo $row['item_img1']; ?>"> 
                            	<?php 
                            		if (!empty($row['item_img2'])) {
                            	 ?>
                            	 <img class="img-thumbnail" width="180" height="70"  src="<?php echo $row['item_img2']; ?>">
                            	 <?php	
                            		}
                            	 ?>
                            	<?php 
                            		if (!empty($row['item_img3'])) {
                            	 ?>
                            	 <img class="img-thumbnail" width="180" height="70"  src="<?php echo $row['item_img3']; ?>">
                            	 <?php	
                            		}
                            	 ?>
                            	 
                        	</th>
                        	<form method="POST">
                            <th class="text-left" scope="col"> 
                            	<p><b>Type:  	</b> <input type="text" name="item_type" placeholder="<?php echo $row['item_type']; ?>"></p>
                            	<p><b>Value: 	</b> <input type="text" name="item_value" placeholder="<?php echo $row['item_value']; ?>"></p> 
                            	<p><b>Origin: 	</b> <input type="text" name="item_origin" placeholder="<?php echo $row['item_origin']; ?>"> </p> 
                            	<p><b>Description: </b> <textarea type="text" name="item_description" placeholder="<?php echo $row['item_description']; ?>"></textarea></p> 
                        	</th>
                            <th scope="col"> 
                            	 <!-- <input type="text" name="item_id" placeholder="<?php// echo $row['item_id']; ?>"> -->
                            	<input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                        		
                        		<input type="submit" name="itemedit" class="btn btn-outline-success" value="Edit" >
                        		<input type="submit" name="delete" class="btn btn-outline-danger" value="Delete" >
                              
                            </th>
                            </form>
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
    

