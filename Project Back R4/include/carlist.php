<?php include_once("admin/include/conn.php");
// the function in conn.php return all records in car table
$result=getRows('car');
?>

<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        

        <div class="row">
       <?php foreach($result as $row){
        // to display active cars 
          if($row["active"]){
              $id=$row["id"];
              $title=$row["title"];
              $content=$row["content"];
              $luggage=$row["Luggage"];
              $doors=$row["Doors"];
              $passengers=$row["Passengers"];
              $category=$row["cat_id"];
              $price=$row["Price"];
              $image=$row["image"];
        ?>
            <div class="col-md-6 col-lg-4 mb-4">

              <div class="listing d-block  align-items-stretch">
                <div class="listing-img h-100 mr-4">
                  <img src="images/<?php echo $image?>" alt="<?php echo $title?>" class="img-fluid">
                </div>
                <div class="listing-contents h-100">
                  <h3><?php echo $title?></h3>
                  <div class="rent-price">
                    <strong><?php echo $price?></strong><span class="mx-1">/</span>day
                  </div>
                  <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                    <div class="listing-feature pr-4">
                      <span class="caption">Luggage:</span>
                      <span class="number"><?php echo $luggage?></span>
                    </div>
                    <div class="listing-feature pr-4">
                      <span class="caption">Doors:</span>
                      <span class="number"><?php echo $doors?></span>
                    </div>
                    <div class="listing-feature pr-4">
                      <span class="caption">Passenger:</span>
                      <span class="number"><?php echo $passengers?></span>
                    </div>
                  </div>
                  <div>
                    <p><?php echo $content?></p>
                    <p><a href="single.php?id=<?php echo $id?>" class="btn btn-primary btn-sm">Rent Now</a></p>
                  </div>
                </div>

              </div>
            </div>

          
        <?php }}?>
        </div>
      </div>
    </div>
