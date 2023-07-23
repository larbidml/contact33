<?PHP
$sub_header ="Contactos";
$formAction ="00-nif_all_r.php";
$placeholder_valor ="nombre o nif o telefono";

include_once '../../resource/headerPage.php';
?>
<!-- body -->
    <div class="container bg-red">
        <div class="row justify-content-center">
            <div class="col col-lg-10 text-light bg-dark">          
                <br>
            <form method="post" action="02-nif_all_r.php">
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


