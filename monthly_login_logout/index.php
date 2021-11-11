<!DOCTYPE html>
<html lang="en">
<head>
  <title>MYOL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

    <style>.asteriskField{color: red;}</style>
  <script>
    $( function() {
    $( "#datepicker" ).datepicker({ changeMonth: true, changeYear: true });
    $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    } );
  </script>
</head>
<body>
<?php
  include("db_connection_asterisk.php");
?>
<div class="container-fluid">
  <div class="col-sm-offset-0 col-sm-12">
    <div class="panel panel-primary">
      <div class="panel-heading"><center><b>DATEWISE AGENT LOGIN/LOGOUT DATE & TIME (for One Month from Start Date)</b></center></div>
      <div class="panel-body">
        <div class="row" style="margin-bottom: 10px;">
          <div class="col-sm-offset-2 col-sm-8">
            <form class="form-inline" method="post">
              <div class="form-group">
                  <label class="control-label requiredField" for="date">
                    Start Date
                    <span class="asteriskField">
                      *
                    </span>
                  </label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar">
                      </i>
                    </div>
                    <input class="form-control" id="datepicker" name="start_date" placeholder="YYYY-MM-DD" type="text" required="" />
                  </div>
              </div>

              <div class="form-group">
                <label for="">Select User
                  <span class="asteriskField">
                      *
                    </span>
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-chevron-down">
                      </i>
                    </div>
                  <select class="form-control" id="" name="user" required="">
                    <option value="">-----Select User-----</option>
                    <?php
                      $sqlUser = "SELECT user_id, user FROM vicidial_users ORDER BY user";
                      $resultUser = $connAsterisk->query($sqlUser);

                      if ($resultUser->num_rows > 0) {
                          // output data of each row
                          while($rowUser = $resultUser->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $rowUser["user"]; ?>"><?php echo $rowUser["user"]; ?></option>
                    <?php

                          }
                      } 
                    ?>
                    
                  </select>
                </div>
              </div>

              <div class="form-group">
                <button class="btn btn-primary " name="submit" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <?php
          if(isset($_POST["submit"]))
          {
            echo "<h4><center>Start Date: <b>".$_POST['start_date']."</b>; User: <b>".$_POST['user']."</b></center></h4>";
          }
        ?>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="success">
                  <th>USER</th>
                  <th>LOGIN TIME</th>
                  <th>LOGOUT TIME</th>
                  <th>CAMPAIGN</th>
                  <th>GROUP</th>
                </tr>
              </thead>
              <tbody>

              <?php
                if(isset($_POST["submit"])){
                
                $start_date = $_POST['start_date'];
                $user = $_POST['user'];

                for($i = 0; $i<31; $i++)
                {
                  $increasingDate = strtotime("+".$i." day", strtotime($start_date));
                  $increasedDate = date("Y-m-d", $increasingDate);
                  //echo $increasedDate.", ";

                  $sql = "SELECT user_log_id, user, event, event_date, campaign_id, user_group FROM vicidial_user_log where user='$user' and `event`= 'LOGIN' and event_date >= '$increasedDate 00:00:00' and event_date <= '$increasedDate 23:59:59' order by event_date limit 1";
                  $result = mysqli_query($connAsterisk, $sql);

                  $sql2 = "SELECT user_log_id, user, event, event_date, campaign_id, user_group FROM vicidial_user_log where user='$user' and `event`= 'LOGOUT' and event_date >= '$increasedDate 00:00:00' and event_date <= '$increasedDate 23:59:59' order by event_date DESC limit 1";
                  $result2 = mysqli_query($connAsterisk, $sql2);

                  if ((mysqli_num_rows($result) > 0) || (mysqli_num_rows($result2) > 0)) {
                      // output data of each row
                      while(($row = mysqli_fetch_assoc($result))) {   
              ?>
                        <tr>
                          <td><?php echo $row["user"]; ?></td>
                          <td><?php echo $row["event_date"]; ?></td>
                          <?php
                          	if(($row2 = mysqli_fetch_assoc($result2))) {
                          ?>
                          	<td><?php echo $row2["event_date"]; ?></td>
                          <?php
                      	  	} else {
                      	  ?>
                      		<td class="bg-danger">Did not Logout</td>
                      	  <?php
                      		}
                          ?>
                          <td><?php echo $row["campaign_id"]; ?></td>
                          <td><?php echo $row["user_group"]; ?></td>
                        </tr>
              <?php
                      }
                  }
                }
                mysqli_close($connAsterisk);
                }
              ?>
       
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>





</body>
</html>
