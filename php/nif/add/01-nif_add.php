<?PHP
$sub_header ="Añadir contacto";
include_once '../../resource/headerPage.php';
?>

		
<div class="container bg-dark">
    <form  action="02-nif_add_r.php" method="post">

        <!-- div1 -->
            <div class="form-row bg-dark">
            <input  type="hidden" class="form-control" id="id" name="id"  >

                    <!-- doctypo -->
                        <div class="form-group col-md-1">
                        <label class=" text-light" for="doctypo">TYPO :</label>
                        <select class="form-control" name="doctypo" id="doctypo" >
                            <option value="nie">NIE</option>
                            <option  value="dni">DNI</option>
                            <option  value="pass">PASS</option>
                        </select>
                        </div>

                    <!-- nif -->
                        <div class="form-group col-md-3">
                        <label class=" text-light" for="course">Nif :</label>
                        <input  type="text" class="form-control" id="nif" name="nif"  >
                        </div>
                    
                    <!-- f vencimiento nif -->
                    <!-- dia -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">FV dd:</label>
                    <input  type="text"  class="form-control bg-info" id="Fvendia" name="Fvendia" placeholder="dd" >        
                    </div>
                    <!-- mes -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">mm:</label>
                    <input  type="text" class="form-control bg-info" id="Fvenmes" name="Fvenmes" placeholder="mm">        
                    </div>
                    <!-- año -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">Año:</label>
                    <input  type="text" class="form-control bg-info" id="Fvenano" name="Fvenano" placeholder="aaaa">        
                    </div>

                    <!-- tel1 -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">Tel 1:</label>
                    <input  type="text" class="form-control" id="tel1" name="tel1" >
                    </div>

                    <!-- tel2 -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">Tel 2:</label>
                    <input  type="text" class="form-control" id="tel2" name="tel2" >
                    </div>
            </div>  
        <!--End div1 -->

        <!-- div2 -->
            <div class="form-row bg-dark">
                <!-- nombre1 -->
                <div class="form-group col-md-4">
                <label class=" text-light"  for="course"> Nombre:</label>
                <input  type="text" class="form-control" id="nombre1" name="nombre1"  placeholder="nombre">
                </div>

                <!-- apellido1 -->
                <div class="form-group col-md-4">
                <label class=" text-light"  for="course"> apellido 1:</label>
                <input  type="text" class="form-control" id="apellido1" name="apellido1"  placeholder="apellido 1 ">
                </div>

                <!-- apellido2 -->
                <div class="form-group col-md-4">
                <label class=" text-light"  for="course"> apellido 2:</label>
                <input  type="text" class="form-control" id="apellido2" name="apellido2"  placeholder="apellido 2">
                </div>

                <!-- Fecha nacimiento-->
                    <!-- dia -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">FN dd:</label>
                    <input  type="text" class="form-control bg-warning" id="fn2dia" name="fn2dia" placeholder="dd ">        
                    </div>
                    <!-- mes -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">mm:</label>
                    <input  type="text" class="form-control bg-warning" id="fn2mes" name="fn2mes" placeholder="mm ">        
                    </div>
                    <!-- año -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">Año:</label>
                    <input  type="text" class="form-control bg-warning" id="fn2ano" name="fn2ano" placeholder="aaaa ">        
                    </div>
            </div>  
        <!--End div2 -->

        <!-- div3 -->
            <div class="form-row bg-dark">
                <!-- CALLE -->
                    <div class="form-group col-md-6">
                    <label class=" text-light"  for="course">CALLE :</label>
                    <input  type="text" class="form-control" id="CALLE" name="CALLE" >
                </div>
                <!-- NOCALLE -->
                <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">NO:</label>
                    <input  type="text" class="form-control" id="NOCALLE" name="NOCALLE" >
                </div>
                <!-- PISO -->
                <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">PISO :</label>
                    <input  type="text" class="form-control" id="PISO" name="PISO" >
                </div>
                <!-- PUERTA -->
                <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">PUERTA :</label>
                    <input  type="text" class="form-control" id="PUERTA" name="PUERTA" >
                </div>
                <!-- CP -->
                <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">CP :</label>
                    <input  type="text" class="form-control" id="CP" name="CP" >
                </div>
                <!-- CIUDAD -->
                <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">CIUDAD :</label>
                    <input  type="text" class="form-control" id="CIUDAD" name="CIUDAD" VALUE="MATARO" >
                </div>
                <!-- CATASTRO -->
                <div class="form-group col-md-4">
                    <label class=" text-light"  for="course">CATASTRO :</label>
                    <input  type="text" class="form-control" id="CATASTRO" name="CATASTRO" >
                </div>

            </div>  
        <!--End div3 -->

        <!-- div4 -->
            <div class="form-row bg-dark">


                
                <!-- Cuenta Bancaria -->
                <!-- CBANCARIA1 -->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">CB-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA1" name="CBANCARIA1" placeholder="ES00 ">        
                </div>
                <!-- CBANCARIA2-->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA2" name="CBANCARIA2" placeholder="0000 ">        
                </div>
                <!-- CBANCARIA3 -->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA3" name="CBANCARIA3" placeholder="0000 ">        
                </div>
                <!-- CBANCARIA4 -->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA4" name="CBANCARIA4" placeholder="0000 ">        
                </div>
                <!-- CBANCARIA5-->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA5" name="CBANCARIA5" placeholder="0000 ">        
                </div>
                <!-- CBANCARIA6 -->
                <div class="form-group col-md-1">
                <label class=" text-light"  for="course">-</label>
                <input  type="text" class="form-control bg-success" id="CBANCARIA6" name="CBANCARIA6" placeholder="0000 ">        
                </div>

            </div>  
        <!--End div4 -->

        <!-- div5 -->
            <div class="form-row bg-dark">

                    <!-- correo electronico -->
                    <div class="form-group col-md-8">
                    <label class=" text-light"  for="course">Email :</label>
                    <input  type="text" class="form-control" id="correo" name="correo" placeholder="@">                                
                    </div>




                    <!-- TSANITARIA -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">T SANITARIA :</label>
                    <input  type="text" class="form-control" id="TSANITARIA" name="TSANITARIA" placeholder=" ">                                  
                    </div>
                    
                    <!-- TFnumerosa -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">T F numerosa :</label>
                    <input  type="text" class="form-control" id="TFnumerosa" name="TFnumerosa" placeholder=" ">                                 
                    </div>

                    <!-- PASAPORTE -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">PASAPORTE :</label>
                    <input  type="text" class="form-control bg-info" id="PASAPORTE" name="PASAPORTE" placeholder=" ">                                
                    </div>

                    
                    <!--  F vencimiento Pasaporte-->
                    <!-- dia -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">FV dd:</label>
                        <input  type="text" class="form-control bg-info" id="FVPASPORTdia" name="FVPASPORTdia" placeholder="dd">        
                    </div>

                    <!-- mes -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">mm:</label>

                        <input  type="text" class="form-control bg-info" id="FVPASPORTmes" name="FVPASPORTmes" placeholder="mm">        
                    </div>

                    <!-- año -->
                    <div class="form-group col-md-1">
                    <label class=" text-light"  for="course">Año:</label>

                        <input  type="text" class="form-control bg-info" id="FVPASPORTano" name="FVPASPORTano" placeholder="aaaa">        
                    </div>

                    <!-- GENERO -->
                    <div class="form-group col-md-2">
                    <label class=" text-light"  for="course">GENERO :</label>
                    <select class="form-control" name="GENERO" id="GENERO" >
                            <option value="HOMBRE">HOMBRE</option>
                            <option  value="MUJER">MUJER</option>
                    </select>                              
                    </div>

                    <!-- FAMILIA -->
                    <div class="form-group col-md-2">
                        <label class=" text-light"  for="course">FAMILIA :</label>
                        <input  type="text" class="form-control " id="FAMILIA" name="FAMILIA" placeholder=" ">                                
                    </div>
                    
                    <!-- NACIONALIDAD -->
                    <div class="form-group col-md-2">
                        <label class=" text-light"  for="course">NACIONALIDAD :</label>
                        <input  type="text" class="form-control " id="NACIONALIDAD" name="NACIONALIDAD"     VALUE="MARRUECOS">                                
                    </div>
                    
                    <!-- ESTADOCIVIL -->
                    <div class="form-group col-md-2">
                        <label class=" text-light"  for="course">ESTADOCIVIL :</label>
                        <select class="form-control" name="ESTADOCIVIL" id="ESTADOCIVIL" >
                            <option value="S">SOLTERO</option>
                            <option  value="C">CASADO</option>
                            <option value="V">VIUDO</option>
                            <option  value="D">DIVORCIADO</option>
                            <option  value="P">SEPARADO</option>
                        </select>                                 
                    </div>

                    <!-- SOPORTE -->
                    <div class="form-group col-md-2">
                        <label class=" text-light"  for="course">SOPORTE:</label>
                        <input  type="text" class="form-control" id="SOPORTE" name="SOPORTE" >
                    </div>


                    <!-- nota -->
                    <div class="form-group col-md-12">
                        <label class=" text-light"  for="course">Nota:</label>
                        <input  type="text" class="form-control" id="nota" name="nota" >
                    </div>

            </div>  
        <!--End div5 -->

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