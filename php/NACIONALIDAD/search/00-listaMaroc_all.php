<?PHP
$sub_header ="lista";
$formAction ="00-lista_all_r.php";
$placeholder_valor ="nombre o lista o telefono";

include_once '../../resource/headerPage.php';
?>

<!-- body -->
    <div class="container bg-red">
        <div class="row justify-content-center">
            <div class="col col-lg-10 text-light bg-info">          
                <br>
            <form method="post" action="00-listaMaroc_all_r.php">
                    <div class="form-group row">          
                        <label class="col-form-label col-sm-3" for="exampleFormControlSelect1">Busqueda:</label>
                            <select class="form-control col-sm-6 bg-secondary text-light" type="text"  name="terminobusqueda" id="terminobusqueda">
                                <option value="TODOS">TODOS</option>
                                <option value="LAHYANI">LAHYANI</option>
                                <option value="HICHAM">HICHAM</option>
                                <option value="YAAKOUBI">YAAKOUBI</option>
                                <option value="CABALLOS HARRAK">CABALLOS HARRAK</option>
                                <option value="BILAL EL ADIL">BILAL EL ADIL</option>
                                <option value="OTROS">OTROS</option>
                                <option value="PROPIO">PROPIO</option>

                            </select>
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


