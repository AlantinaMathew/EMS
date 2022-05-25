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
      <th>Place</th>
      <th>DOB</th>
      <th>Gender</th>
      <th>Blood Group</th>
     
      <th>Status</th>
     
      
     
    </tr>
    <?php
 $con = mysqli_connect("localhost","root","","finaldb");
$q=mysqli_query($con,"SELECT a.name,a.email,a.phone,a.place,b.dob,b.gender,b.bloodgrp,b.status FROM users a inner join tbl_donor b where a.id=b.uid");
$s=1;
while ($d1 = mysqli_fetch_array($q)) {
    
?>
    <tr>
        <td><?php echo $s;?> </td>
      <td><?php echo $d1['name'];?></td>
      
      <td><?php echo $d1['email'];?></td>
     
      <td><?php echo $d1['phone'];?></td>
      <td><?php echo $d1['place'];?></td>
      <td><?php echo $d1['dob'];?></td>
      <td><?php echo $d1['gender'];?></td>
      <td><?php echo $d1['bloodgrp'];?></td>

      <td><?php
          if($d1['status']==1){
echo "<p style='color:red;'>ACTIVATE</p>";
          }else
          {
            echo "<p style='color:blue;'>DEACTIVATE</p>";
          }
     ?> </td>
     
         
      
      
      
    </tr>
    <?php
    $s=$s+1;
    }
      ?>
    
  </table>
</div>
</div>
@endsection