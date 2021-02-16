<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/nuevoProd.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/Em_icono.ico"/>
    <title>NuevoProd</title>
</head>
<body>
    
    <div class="contenedorGeneral">

        <input type="checkbox" id="check" >
		    <label for="check" class="check_btn">
		        <i class="fas fa-bars"></i>
		    </label>
    <?php include '../views/header_admin.html'; ?>

        <div class="contenido">
            <div class="tarj">
                <h1>Nuevo Producto</h1>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="POST" enctype="multipart/form-data">

                    <div class="derecha">
                            <div class="elemento">
                                <p>Nombre de la obra</p>
                                <input type="text" class="casillatext" name="nombre" placeholder="Nombre" required>
                            </div>
                            
                            <div class="elemento">
                                <p>Categoria</p>
                                <select name="ddl_categoria" id="ddl_categoria" class="ddl_categoria" required>
                                    <option value="">Elige una categoria</option>
                                    <?php foreach ($category as $item_cat):?>
                                    <option value="<?php echo $item_cat['idCategory']?>"><?php echo $item_cat['category']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="elemento">
                                <p>Descripción</p>
                                <textarea name="descripcion" id="descripcion" class="descripcion" cols="30" rows="10" placeholder="Descripción" required></textarea>
                            </div>

                            <div class="elemento precios">
                                <p>Precio   MXN</p>
                                
                                <input type="number" min="0" class="pesos" name="pesos" value="00">
                                <label class="dot">.</label>
                                <input type="number" min="0" class="cents" name="cents" value="00">
                            </div>
                    </div>

                    <div class="izqu">
                        <div class="elemento">
                            <p>Imagen</p> <p class="extra_img">Preferentemente de 500x400</p>
                            <input type="file" name="my_image" id ="inpFile" class="inputfile" accept="image/*">
                            <label for="inpFile"><i class="fas fa-cloud-upload-alt"></i>  &nbsp;  Eliga una imágen</label>
                            <div class="image-preview" id="imagePreview">
                                <img src="" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text">Imagen seleccionada.</span>

                            </div>
                        </div>

                        
                        <!-- tabla de etiquetas -->

                        <div class="cointainer">
                            <p>Etiquetas del producto</p><p class="extra_img">Máximo 5</p>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="name[]" id="name" palceholder="Enter sticker" class="form-control name_list" required></td>
                                        <td><i name="add" id="add" class="btn btn-succes">+</i></td>
                                    </tr>
                                </table>
                        </div>

                    </div>

                    <input type="submit" name="submit" class="botonEditar" value="Actualizar">
                        
                </form>

                <?php if(!empty($em)):?>
                <div class="errores">
                    <ul>
                        <?php echo $em;?>
                    </ul>

                </div>
                <?php endif;?>
            </div>
        
            
            <?php if($signal == true):?>
                <div class="confirmation">
                    <p>Registro Finalizado con exito</p>
                    <i class="fas fa-times" id="close"></i>
                </div>
            <?php  endif;?>
        </div>

    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/nuevoProd.js"></script>

    <script>
    
        $(document).ready(function(){
                var i = 1;
                $('#add').click(function(){
                    
                    if (i < 5) {
                        i++;
                        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" palceholder="Enter sticker" class="form-control name_list" required></td><td><i name="remove" id="'+i+'" class="btn btn-danger btn-remove">-</i></td></tr>');    
                    }
                    
                });

                $(document).on('click', '.contenedorGeneral .contenido .tarj .izqu .btn-remove', function(){
                    i--;
                    var button_id = $(this).attr("id");
                    $('#row'+button_id+'').remove();
                });

              
            });
    </script>

    <script>
        const inpFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

        inpFile.addEventListener("change", function(){
            
            const file = this.files[0];

            

            if(file)
            {
                const reader = new FileReader();

                previewDefaultText.style.display ="none";
                previewImage.style.display ="block";

                reader.addEventListener("load", function(){
                    
                    previewImage.setAttribute("src",this.result);
                });

                reader.readAsDataURL(file);
            }
            else
            {
                previewDefaultText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src","");
            }
        });
    </script>
 

	
</body>
</html>