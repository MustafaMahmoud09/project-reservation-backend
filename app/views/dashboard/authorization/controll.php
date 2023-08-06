
<?php
  
    require_once 'header.php'; 

?>


<div class="card">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">Title</th>
                      <th>Admin Name</th>
                      <th>Description</th>
                      <th style="width: 40px">Image</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                 <?php foreach($menu as $oneMenu):?>

                  <tbody>
                  
                    <tr>

                      <td><?=$oneMenu['title']?></td>
                      <td><?=$oneMenu['name']?></td>
                      <td><?=$oneMenu['description']?></td>
                      <td><img src="<?= $oneMenu['path']?>" /></td>
                      <td><a href="delete\<?= $oneMenu['id']?>" >Delete</a></td>
                      <td><a href="update\<?= $oneMenu['id']?>" >Update</a></td>
                    
                    </tr>
                  
                  </tbody>

                <?php endforeach;?>

                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
  </div>


  <?php
  
       require_once 'nav.php'; 
  
  ?>