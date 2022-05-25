@extends('admin_layout')


@section('content')

<div class="outer">
<div style="overflow-x: auto;">
  <table>
    <tr>
    <th>Slno</th>
      <th>Name</th>
      
      <th>Email</th>
      <th>Phone</th>
     
      
      <th>Service</th>
     
     
      <th>Place</th>
     
      
     
    </tr>
    <?php
 $con = mysqli_connect("localhost","root","","finaldb");
$q=mysqli_query($con,"SELECT * FROM tbl_repair");
$s=1;
while ($d1 = mysqli_fetch_array($q)) {
    
?>
    <tr>
        <td><?php echo $s;?> </td>
      <td><?php echo $d1['name'];?></td>
      
      <td><?php echo $d1['email'];?></td>
     
      <td><?php echo $d1['phone'];?></td>
     
      <td><?php 
      $id=$d1['id'];
      $service=mysqli_query($con,"SELECT * FROM `rep_service` where rid='$id'");
      while ($ser = mysqli_fetch_array($service)) {
           echo $ser['service'];
           echo ",";}     ?></td>
      
      <td><?php 
     
      $place=mysqli_query($con,"SELECT * FROM `rep_loc` where rid='$id'");
      while ($loc = mysqli_fetch_array($place)) {
           echo $loc['place'];
           echo ",";}     ?></td>

      
     
         
      
      
      
    </tr>
    <?php
    $s=$s+1;
    }
      ?>
    
  </table>
</div>
</div>
@endsection