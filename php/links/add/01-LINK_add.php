<?PHP
$sub_header ="Añadir LINK ";
include_once '../../resource/headerPage.php';
?>

		
<div class="container bg-dark">
    <form  action="02-LINK_add_r.php" method="post">

<!-- div1 -->
    <div class="form-row bg-dark">

        <!-- ORGANISMOnombre	 -->
        <div class="form-group col-md-12">
        <label class=" text-light" for="course">ORGANISMOnombre	 :</label>
        <input  type="text" class="form-control" id="ORGANISMOnombre" name="ORGANISMOnombre"  >
        </div>

        <!-- bgcolor -->
        <div class="form-group col-md-3">
        <label class=" text-light" for="bgcolor">bgcolor :</label>
        <select class="form-control" name="bgcolor" id="bgcolor" >

            <option value=""></option>
            <option class="form-control bg-primary " value="text-primary">text-primary</option>
            <option class="form-control bg-secondary" value="text-secondary">text-secondary</option>
            <option  class="form-control bg-success" value="text-success">text-success</option>
            <option  class="form-control bg-danger"value="text-danger">text-danger</option>
            <option   class="form-control bg-info" value="text-info">text-info</option>
            <option class="form-control bg-light"  value="text-light">text-light</option>
            <option  class="form-control bg-dark" value="text-dark">text-dark</option>
            <option   class="form-control bg-muted" value="text-muted">text-muted</option>
            <option  class="form-control bg-white" value="text-white">text-white</option>
            <option  class="form-control bg-warning" value="text-warning">text-warning</option>

        </select>
        </div>


              

    </div>  
<!--End div1 -->


<!-- div6 -->
    <div class="form-row bg-dark">
        <!-- btn -->
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>  
<!--End div6 -->

        
    </form>
<br>
 </div>


<?PHP
include_once '../../resource/footerPage.php';
?>