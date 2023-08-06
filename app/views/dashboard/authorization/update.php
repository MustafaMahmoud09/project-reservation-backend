

<?php

     
       require_once 'header.php';


?>


  <?php if(!empty($dataMenu)):  ?>

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Menu</h3>
              </div>
           
              <form action="<?= DOMAIN.'AuthorizationAdmin/postUpdateMenu/'.$idItem;?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text"name="title" class="form-control" id="exampleInputEmail1" value="<?= $dataMenu['title'] ?>" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description"class="form-control" id="exampleInputPassword1"value="<?= $dataMenu['description'] ?>" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text"name="price" class="form-control" value="<?= $dataMenu['price'] ?>" id="exampleInputPassword1" placeholder="Price">
                  </div>
                  <div class="form-group">
                   <img src="<?= $dataMenu['path'] ?>"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                  <!-- #region -->
                      <div class="custom-file">
                        <input type="file" name="image" value="" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update">Submit</button>
                </div>
                </div>
   </div>
  </div>

  
  <?php endif;?>

  <?php

     
       require_once 'nav.php';


 ?>