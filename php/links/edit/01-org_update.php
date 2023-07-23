<?PHP
$sub_header ="Modificar  organizacion";
$formAction ="03-nif_update_form.php";
$placeholder_valor ="nombre o nif o telefono";

include_once '../../resource/headerPage.php';
?>
<!-- body -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-7  text-light bg-info">          
                <br>
            <form method="post" action="02-org_update_SELECT.php">
                    <div class="form-group row">          
                        <label class="col-form-label col-sm-3" for="exampleFormControlSelect1">Busqueda:</label>
                        <input type="text" class="form-control col-sm-6" id="usr" name="terminobusqueda" placeholder="nombre o nif o telefono">
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                <br>          
            </div>
    </div>

</div>
<!--end body -->

<?PHP   include_once '../../resource/footerPage.php'; ?>
