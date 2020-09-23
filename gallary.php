<?php include './dbcon.php'; ?>
<!-- Head -->
<!-- ---------------------------- -->
 <?php include'heading.php'; ?>
<!-- ---------------------------- -->
<!-- ---------------------------- -->



<!-- Gallary -->
	<div class="picdiv row mt-4 mb-4 bg-tcolor" id="gallary"  >
	  <div class="col-md-10 offset-md-1">

    	<h1 class="m-2 p-3 text-white text-center display-1" style="box-shadow: 10px;">Gallary</h1>

   	  </div>
   </div>
<!-- Gallary      -->

				  	 <!-- catagory loop -->

					<?php 
				  		$query= "SELECT*FROM catagory ORDER BY catagory_name ASC";
					            $result= mysqli_query($con, $query);
					            $num_rows=mysqli_num_rows($result);
					            $no=1;
					            if ($num_rows > 0){
              						while ($row = mysqli_fetch_assoc($result)){
				  	 ?>
				  	 <!-- catagory loop -->
						  
                       
						<div class="row mt-4 border border-top-dark">
							<div class="col-md-12">
								<!-- catagories -->
								<div class="card ">

								  <div class="card-header bg-tcolor">
						    			<h3 class="text-white text-center">Catagory name:<?php echo $row['catagory_name']; ?></h3>
								  </div>

								  <!-- Item_catagory_ref Loop -->
									<?php
									 	$catagory=$row['catagory_name'];

				              							
								  		$query= "SELECT*FROM Item_catagory_ref WHERE catagory_name='$catagory' ORDER BY item_name ASC";
									            $res= mysqli_query($con, $query);
									            $num_rows=mysqli_num_rows($res);

									            if (empty($num_rows)) {
				              								?>

				              									<div class="alert alert-secondary">
																  There is no item here!
																</div>

				              								<?php
				              							}
									            
									            if ($num_rows > 0){
				              						while ($r = mysqli_fetch_assoc($res))
				              						{

				              							$item_id=$r['item_id'];


				              							// $item_name=$r['item_name'];

				              							//fetch item_id from item table
														$query= "SELECT*FROM item WHERE item_id='$item_id'";
														$results= mysqli_query($con, $query);
														$data= mysqli_fetch_assoc($results);
														
														// echo $data['item_id'];
														// echo $data['item_name'];
														// echo $data['item_type'];
														// echo $data['item_value'];
														// echo $data['item_origin'];
														// echo $data['item_description'];
														// echo $data['item_img1'];
														// echo $data['item_img2'];
														// echo $data['item_img3'];

								  	 ?>
								  <div class="card-body m-2 border gallaryitems" >
								    <h4 class="card-title text-center text-scondary">Item Name: <?php echo $data['item_name']; ?></h4>
								 	<div class="row ">
								 		<div class="col-md-4"><img src="<?php echo $data['item_img1']; ?>" class="img-thumbnail" ></div>
								 		<div class="col-md-4"><img src="<?php echo $data['item_img2']; ?>" class="img-thumbnail" ></div>
								 		<div class="col-md-4"><img src="<?php echo $data['item_img3']; ?>" class="img-thumbnail" ></div>
								 		
								 	</div>
								    <p class="card-text"><b>Type :</b>  <?php echo $data['item_type']; ?></p>
								    <p class="card-text"><b>Value:</b>   <?php echo $data['item_value']; ?></p>
								    <p class="card-text"><b>Origin:</b> <?php echo $data['item_origin']; ?></p>
								    <p class="card-text"><b>Description:</b> <?php echo $data['item_description']; ?></p>
								    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
								  </div>


								  	<?php
									  	 
									  	 			} 
									  			} 
									?>
								  <!-- Item_catagory_ref Loop -->

								
								  <div class="card-footer text-muted bg-tcolor">
								    Total Items in catagory:<?php echo $num_rows; ?>
								  </div>
								</div>
								<!-- catagories -->
								
							</div>
						</div>                          
				  	 <!-- catagory loop -->

				  	 <?php
				  	 $no+=1 ;
				  	 } 
				  	} ?>
				  	 <!-- catagory loop -->

<!-- <div class="row mt-4 border border-top-dark">
	<div class="col-md-12"> -->
		<!-- catagories -->
		<!-- <div class="card ">

		  <div class="card-header bg-tcolor">
    		<h3 class="text-white text-center">Catagory name:</h3>
		  </div>

		 <div class="card-body m-2 border gallaryitems" >
		    <h4 class="card-title text-center text-scondary">Item Name</h4>
		 	<div class="row ">
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		
		 	</div>
		    <p class="card-text"><b>Type :</b>   </p>
		    <p class="card-text"><b>Value:</b>   </p>
		    <p class="card-text"><b>Origin:</b>  </p>
		    <p class="card-text"><b>Description:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
		    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
		  <!-- </div>

		   <div class="card-body m-2 border gallaryitems">
		    <h4 class="card-title text-center text-scondary">Item Name</h4>
		 	<div class="row ">
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		<div class="col-md-4"><img src="./img/1pound-Science-1Denopic1.jpg" class="img-thumbnail" ></div>
		 		
		 	</div>
		    <p class="card-text"><b>Type :</b>   </p>
		    <p class="card-text"><b>Value:</b>   </p>
		    <p class="card-text"><b>Origin:</b>  </p>
		    <p class="card-text"><b>Description:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
		    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
		  <!-- </div>

		  <div class="card-footer text-muted bg-tcolor">
		    Total Items in catagory:1001
		  </div>
		</div> -->
		<!-- catagories -->
		
	<!-- </div>
</div> -->






<!-- ------------------------- -->
 <!-- foot -->           
<!-- ---------------------------- -->
 <?php include'foot.php'; ?>
<!-- ---------------------------- -->
    

