
<html xmlns="http://www.w3.org/1999/xhtml">  
   <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
<title>Untitled Document</title>  
   </head>  

   
<body>  
 <div class="container mt-5">
<h1 style = "text-align: center;">Dates Functions In Codeigniter</h1>



<form action="">

    <div class="form-group">
    <label for="exampleFormControlSelect1">Next 10 Days Dates</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <?php
       $date = date('Y-m-d'); //today date
         $weekOfdays = array();
         for($i =1; $i <= 10; $i++){
            $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            // print_r($date); exit;
            $weekOfdays[] = date('l : d-m-Y', strtotime($date));
     }
      ?>
      <option value = "<?= date('d-m-Y') ?>"><?= 'Today : '.date('d-m-Y') ?></option>
      <?php foreach($weekOfdays as $days){?>
      <option value = "<?= $days ?>"><?= $days ?></option>
   
     <?php } ?>
     </select>
    </div>
    
    
    <div class="form-group">
    <label for="exampleFormControlSelect1">Display Time With 1 Hour Interval</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <?php
       $start = date('H:i');
       $end = "24:00";
   
       $tStart = strtotime($start);
       $tEnd = strtotime($end);
       $tNow = $tStart;
      ?>
      <?php while($tNow <= $tEnd){ ?>
     <option value = "<?= date("H:i:s a",$tNow) ?>" ><?= date("H:i:s a",$tNow) ?></option>
     <?php 
       $tNow = strtotime('+1 hours',$tNow);
       }
      ?>
      
    
     </select>
   </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Display Time Slot</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php
         // $start = '01/01/2019 20:00:00';
         // $end = '01/02/2019 08:00:00';
         $start = '00:00:00';
         $end = "24:00:00";

         // for current Time
         // $start = date('H:i');
         // $end = "24:00";

         $time = strtotime($start);
         $timeStop = strtotime($end);

         // while ($time<$timeStop) {
         //    echo date('H:i', $time);
         //    $time = strtotime('+30 minutes', $time);
         //    echo ' - ' . date('H:i', $time) . '<br/>';
         // }
?>
<option hidden>Available Time Slots</option>
      <?php while ($time<$timeStop) { ?>
     <option ><?php echo date('H:i a', $time); 
     $time = strtotime('+1 hours', $time);
     echo ' - ' . date('H:i a', $time) ;
       ?>
   </option>
     <?php 
      
       }
      ?>
      
    
     </select>

    </div>


    <div class="form-group">
    <label for="exampleFormControlSelect1">Disable Weekend Dates</label>
   <input type="text" class = "form-control" id = "dis_dates">
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Multiple Dates Picker</label>
   <input type="text" class = "form-control" id = "datePick">
    </div>
<div class = "row">
   <div class = 'col-md-6'>
         <div class="form-group">
         <label for="exampleFormControlSelect1">Start Date</label>
         <input type="text" class = "form-control" id = "txtFrom">
         </div>
    </div>
    <div class = 'col-md-6'>
         <div class="form-group">
         <label for="exampleFormControlSelect1">End Date</label>
         <input type="text" class = "form-control" id = "txtTo">
         </div>
    </div>
    </div>





</form>












<table class="table table-bordered mt-5">  
      <thead class="thead-light"> 
         <tr>  
            <th>#</th>  
            <th>Booking Dates</th> 
            <th>Format 1</th> 
            <th>Format 2</th>
            <th>Format 3</th>
            <th>Format 4</th>
            <th>Time Ago Format</th>
            <th>No. of Weeks</th>
            <th>Week Number</th>
            <th>No. of Days </th>
            <th>Total No. of Months</th>
            <th>Month Name/Number</th>
            <th>Day Name/Number</th>
            <!-- <th>No of Months With Days</th> -->

         </tr>  
      </thead>
      <tbody>
         <?php  
         
         foreach ($h as $row)  
         {  
            ?><tr>  
            <th scope="row"><?= $row->id;?></th>  
            <td><?= $row->date;?></td>
            <td><?= date("M d, Y", strtotime( $row->date));?></td> 
            <td><?= date("F d, Y", strtotime( $row->date));?></td>
            <td><?= date("M, D, Y", strtotime( $row->date));?></td>
            <td><?= date("d-m-Y", strtotime( $row->date));?></td> 
            <td>
               <!-- Days Ago  -->
            <?php 
                $now = new DateTime;
                $ago = new DateTime($row->date);
                
                $diff = $now->diff($ago);
                  $weeks = $diff->w = floor($diff->d / 7); 
                   // Store in variable to be used for calculation etc
                $years = (int)$diff->format('%Y');
                $months = (int)$diff->format('%m');
                $days = (int)$diff->format('%d');
                $hours = (int)$diff->format('%H');
                $minutes = (int)$diff->format('%i');
                if($years > 0)
                                 {
                                 echo $years.' Years Ago ' ;
                                 }
                                 else if($months > 0)
                                 {
                                 echo $months.' Months Ago ' ;
                                 }
                                 else if($weeks > 0 && $days >= 8 )
                                 {
                                 echo $weeks.' Weeks Ago ';
                                 }
                                 else if($days > 0 && $days <= 7 )
                                 {
                                 echo $days.' Days Ago';
                                 }
                                 else if($hours > 0)
                                 {
                                 echo  $hours.' Hours Ago' ;
                                 }
                                 else
                                 {
                                 echo $minutes.' minutes Ago' ;
                                 }
                  
                
          ?>
         </td> 
         <td>
         <!-- How Many Weeks Between Two Dates -->

               <?php  
                  $now = new DateTime;
                  $ago = new DateTime($row->date);
                  // I have left the remainer. You may need to round up/down. 
                  $differenceInWeeks = $now->diff($ago)->days / 7;
                  // print_r((int)$differenceInWeeks);
                  if($differenceInWeeks >=2){
                  echo (int)$differenceInWeeks.' Weeks Difference' ;

                  }else{
                     echo (int)$differenceInWeeks.' Week Difference' ;
                  }


                ?>

         </td>
         <td>
            <!-- WEEK Number  -->
          <?php
            $ddate = $row->date ;
            $date = new DateTime($ddate);
            $week = $date->format("W");
            echo $week.' (Week Number)';
          ?>
         </td>
         <td> 
            <!-- How Many Days Between Two Dates -->
              <?php 
               $now = new DateTime;
               $ago = new DateTime($row->date);
               $days  = $now->diff($ago)->format('%a');
               if($days >=2){
                  echo $days.' Days' ;

                  }else{
                     echo $days.' Day' ;
                  }
              
              ?>
         </td>
         
         <!-- <td>  -->
            <!-- How Many Months Between Two Dates -->
            <?php
            // $d1 = new DateTime($row->date);
            // $d2 = new DateTime;
            
            // //  $current_y_m = $d1->diff($d2)->m;
               
            //   $total_month = $d1->diff($d2)->m + ($d1->diff($d2)->y*12);
            // //   print_r($total_month);
            // if($total_month >= 2){
            // echo $total_month.' (Months)';
            // }
            // else{
            //    echo $total_month.' (Month)';
            // }
            ?>
         <!-- </td> -->


         <td>
            <?php 
            $date1 = $row->date ;
            $date2 = date('M d, Y');
            
            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);
            

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);
         
            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);
            
            // Only For Total Months  Between Two Dates
            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

            if($diff >= 2){
            echo $diff.' Months';
            }
            else{
               echo $diff.' Month';
            }

            // Total Months with Days

            // $day1 = date('d', $ts1);
            // $day2 = date('d', $ts2);

            // if($day2 < $day1)
            // { 
            //    $diff = $diff - 1;
            //  }
            
            ?>
         </td>
         <td>
            <?php 
           $date_month = date('m',strtotime($row->date));
           $date_month_name = date('F',strtotime($row->date));
           echo $date_month_name.'/'.$date_month ;
            ?>
         </td>
         <td>
            <?php 
           $date_day = date('d',strtotime($row->date));
           $date_day_name = date('l',strtotime($row->date));
           echo $date_day_name.'/'.$date_day ;
            ?>
         </td>


            </tr>  
         <?php }  
         ?>  
      </tbody>  
   </table> 


   

            </div>

            
 


   


   
</body>  
</html>  
<!-- For multiDatesPicker -->
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>

<!-- For Date Range -->



<script type="text/javascript">
         $(document).ready(function () {
            $("#dis_dates").datepicker({
                beforeShowDay: $.datepicker.noWeekends
            });
            $('#datePick').multiDatesPicker({  
               // dateFormat:"D, d M, yy",  
               // altField: "#datePick",  
               // altFormat: "DD, d MM, yy"
            });
           
        });

        
        $("#txtFrom").datepicker({
         dateFormat:"D, d M, yy",
         minDate: 0,
      //   numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() + 1);
            $("#txtTo").datepicker("option", "minDate", dt);
        }
    });

    $("#txtTo").datepicker({
      dateFormat:"D, d M, yy",
      minDate: 1,
      //   numberOfMonths: 2,
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#txtFrom").datepicker("option", "maxDate", dt);
        }
    });
        

    </script>
