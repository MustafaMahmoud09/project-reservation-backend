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
                      <th>name</th>
                      <th>phone number</th>
                      <th>number</th>
                      <th >date</th>
                      <th>time</th>
                      <th>message</th>
                    </tr>
                  </thead>
                 
                <?php if(!empty($allReservation)): ?> 

                 <?php foreach($allReservation as $reservation):?>

                  <tbody>
                  
                    <tr>

                      <td><?=$reservation['name']?></td>
                      <td><?=$reservation['phone_number']?></td>
                      <td><?=$reservation['number']?></td>  
                      <td><?=$reservation['date']?></td>
                      <td><?=$reservation['time']?></td>
                      <td><?=$reservation['message']?></td>
                    </tr>
                  
                  </tbody>

                <?php endforeach;?>

                <?php  endif;?>
                
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