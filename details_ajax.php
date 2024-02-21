
<?php
include('db_connection.php');

if(isset($_POST['id'])){

	$id = $_POST['id'];


$query = "SELECT * FROM task t left join user u on t.user_id=u.id where t.id='$id'";

$result = $conn->query($query);
    if($result->num_rows> 0){
      $row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0)
{
	
	?>
	
	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $row['f_name'] .' '. $row['l_name'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	<div class="row mb-3">
        <div class="col-md-6">
                <label for="startdate">Start Date</label>

            <div class=" mb-3 mb-md-0">
                <input class="form-control" id="startdate" type="date" name="s_date" placeholder="Start Date" value="<?= date('d-m-Y',strtotime($row['s_date'])) ?>" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="">
                <label for="EndDate">End Date</label>

                <input class="form-control" id="EndDate" type="date" name="e_date" placeholder="End Date"value="<?= $row['e_date']?>"/>
            </div>
        </div>
        
    </div>

    <div class="row mb-3">
    	<div class="col-md-6">
            <div class="">
                <label for="User">User</label>

                <select class="form-control" id="User" name="user" placeholder="Users">
                   <option value="<?= isset($_POST['f_name']) ? $_POST['f_name']:''?>"><?=$row['f_name']?></option>                   
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <label for="status">Status</label>

                <select class="form-control" id="status" name="status" placeholder="Status" >
                   	<option <?=($row['status']=='progress')?'selected':''?>>In Progress</option>
                    <option <?=($row['status']=='done')?'selected':''?>>Done</option>
                    <option <?=($row['status']=='todo')?'selected':''?>>To-do</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="mb-3 mb-md-0">
                <label for="Desc">Description</label>

                <textarea class="form-control" id="Desc" type="text" name="description" placeholder="Description" value="<?=$row['description']?>" rows="4" ><?=$row['description']?></textarea>
            </div>
        </div>
    </div>
	<?php
	}
}
else
{
	echo "Data Not Found";
}
// if(mysqli_num_rows($query_run) > 0)
// {
//     foreach($query_run as $row)
//     {
//         array_push($result_array, $row);
//     }
//     header('Content-type: application/json');
//     echo json_encode($result_array);
// }
// else
// {
//     echo $return = "<h4>No Record Found</h4>";
// }

}

?>