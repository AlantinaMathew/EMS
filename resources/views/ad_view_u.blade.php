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
      <th>Joined Date</th>
      
     
    </tr>
    <?php
 $con = mysqli_connect("localhost","root","","finaldb");
$q=mysqli_query($con,"SELECT * FROM `users`");
$s=1;
while ($d1 = mysqli_fetch_array($q)) {
    
?>
    <tr>
        <td><?php echo $s;?> </td>
      <td><?php echo $d1['name'];?></td>
      
      <td><?php echo $d1['email'];?></td>
     
      <td><?php echo $d1['phone'];?></td>
      <td><?php echo $d1['place'];?></td>

      <td><?php $date= new DateTime($d1['created_at']);
      echo $date->format('Y-m-d');?></td>
     
         
      
      
      
    </tr>
    <?php
    $s=$s+1;
    }
      ?>
    
  </table>
</div>
</div>
@endsection