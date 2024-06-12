
<li id="header_notification_bar" class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle" href="view_follow_up.php">
<i class="green fa fa-building-o"></i>
<?php
//SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
?><span class="badge bg-warning green-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1");
                $data=mysqli_fetch_assoc($result);
                echo $data['months'];
                ?>
                </span>
              </a>
          </li>
           <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="view_follow_up.php">
              <i class="orange fa fa-building-o"></i>
              <?php 
              //SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
              ?><span class="badge bg-warning orange-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 2");
                $data=mysqli_fetch_assoc($result);
                echo $data['months'];
                ?>
                </span>
              </a>
          </li>
           <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="view_follow_up.php">
              <i class="red fa fa-building-o"></i>
              <?php 
              //SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) = 1
              ?><span class="badge bg-warning red-bg">
                 <?php
                include('dbConfig.php');
                $result=mysqli_query($conn,"SELECT count(12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date))) AS months FROM rent_update_details where 12 * ( YEAR(CURRENT_DATE) -YEAR(rent_paid_date) ) + (MONTH(CURRENT_DATE) - MONTH(rent_paid_date)) >= 3");
                $data=mysqli_fetch_assoc($result);
                echo $data['months'];
                ?>
                </span>
              </a>
          </li>