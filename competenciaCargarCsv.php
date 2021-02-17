<?php

if(isset($_POST['import_user']))
    {
	require_once 'connect.php';
        
        //Aquí es donde seleccionamos nuestro csv
         $fname = $_FILES['sel_file']['name'];
         $chk_ext = explode(".",$fname);
 
         if(strtolower(end($chk_ext)) == "csv")
         {
             //si es correcto, entonces damos permisos de lectura para subir
             $filename = $_FILES['sel_file']['tmp_name'];
			 $filename = addslashes($filename);		 
			 $filename = htmlspecialchars($filename);
             $handle = fopen($filename, "r");
 
             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
             {
               //Insertamos los datos con los valores...
                $conn->query("INSERT into competencia(descripcion,definicion,idTipo) values('$data[0]','$data[1]','$data[2]')") or die('Error: '.mysqli_error($conn));
             }
             //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
             fclose($handle);
                    echo '
				<script type = "text/javascript">
					alert("Archivo subido correctamente!");
					window.location = "competencia.php";
				</script>         
			';
            }
        
         else
         {
           echo '
				<script type = "text/javascript">
					alert("Archivo no es csv, o el archivo no tiene el formato adecuado (separacion por ;)");
					window.location = "competencia.php";
				</script>         
			';
             
         }

    } else {  
    

?>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method='post' enctype="multipart/form-data">
  <div class = "form-group">	
			<label>Importar Archivo Csv:</label>
    <input type='file' name='sel_file' size='20' class = "form-control" required = "required">
   </div>
   <div class="alert alert-info">El fichero a importar debe ser formato .csv separado por (;) y con la codificación UTF8. Descargar ejemplo <a href="database/prueba_competencia.csv" target = "_blank">prueba_competencia.csv</a><br/> El fichero debe contener los siguientes datos:<br/>
    descripcion;definicion;tipo de competencia(id)</div>

   
   <div class = "form-group">	
			<button class = "btn btn-warning" name = "import_user"><span class = "glyphicon glyphicon-edit"></span> Subir </button>
		</div>
                
  </form>
 
</div>
<?php
}
?>
