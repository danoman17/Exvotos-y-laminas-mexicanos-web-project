<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/fdd2e8457c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/EditPanel.css">
    <title>Document</title>
</head>
<body>
    
    <div class="contenedorGeneral">

    <?php include '../views/header_admin.html'; ?>
    

        <div class="contenido">
        <div class="tarj">
                <h1>Editar Producto</h1>
                
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="POST" enctype="multipart/form-data">
                            <input type="text" name ="id" class="id_text" id="id_text" value="<?php echo $result_obj['0'];?>">
                    <div class="derecha">
                            <div class="elemento">
                                <p>Nombre de la obra</p>
                                <input type="text" class="casillatext" name="nombre" placeholder="Nombre" value="<?php echo $result_obj['3'];?>" required>
                            </div>
                            
                            <div class="elemento">
                                <p>Categoria</p>
                                <select name="ddl_categoria" id="ddl_categoria" class="ddl_categoria" required>
                                    <option value="<?php echo $result_obj['1'];?>"> <?php echo $resul_cat_spec['0']; ?></option>
                                    <?php foreach ($result_category as $item_cat):?>
                                    <option value="<?php echo $item_cat['idCategory']?>"><?php echo $item_cat['category']; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>

                            <div class="elemento">
                                <p>Descripción</p>
                                <textarea name="descripcion" id="descripcion" class="descripcion" cols="30" rows="10" placeholder="Descripción" required><?php echo $result_obj['5'];?></textarea>
                            </div>

                            <div class="elemento precios">
                                <p>Precio   MXN</p>
                                
                                <input type="number" min="0" class="pesos" name="pesos" value="<?php echo $unities;?>">
                                <label class="dot">.</label>
                                <input type="number" min="0" class="cents" name="cents" value="<?php echo $cents;?>">
                            </div>
                    </div>

                    <div class="izqu">
                        <div class="elemento">
                            <p>Imagen</p> <p class="extra_img">Preferentemente de 500x400</p>
                            <input type="file" name="my_image" id ="inpFile" class="inputfile" accept ="image/*">
                            <label for="inpFile"><i class="fas fa-cloud-upload-alt"></i>  &nbsp;  Eliga una imágen</label>
                            <div class="image-preview" id="imagePreview">
                                <img src="<?php echo $img_rute;?>" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text">Imagen seleccionada.</span>

                            </div>
                        </div>

                        
                        <!-- tabla de etiquetas -->

                        <div class="cointainer">
                            <p>Etiquetas del producto</p><p class="extra_img">Máximo 5</p>
                                <table class="table table-bordered" id="dynamic_field">
                                    
                                    <tr>
                                        <td><input type="text" name="name[]" id="name" placeholder="Enter sticker" class="form-control name_list" value="<?php echo $resul_stickers['0']['1'];?>" required></td>
                                        <td><i name="add" id="add" class="btn btn-succes">+</i></td>
                                    </tr>
                                    
                                </table>
                        </div>


                        



                    </div>

                    <input type="submit" name="submit" class="botonEditar" value="Actualizar">
                        
                </form>

                <?php if(!empty($em)):?>
                    
                    <?php header("Location: modProd.php");?>
                <div class="errores">
                    <ul>
                        <?php echo $em;?>
                    </ul>

                </div>
                <?php endif;?>
            </div>
        
            
            <?php if($signal == true):?>
                <div class="confirmation">
                    <p>Actualización Finalizada con exito</p>
                    <a href="modProd.php"><i class="fas fa-times" id="close"></i></a>
                </div>
            <?php  endif;?>

        </div>
            
           

    </div>


    	
        <script src="../js/jquery-3.5.1.min.js"></script>

        
    <script>
        document.getElementById("close").addEventListener("click", function(){
            document.querySelector(".contenedorGeneral .contenido .confirmation").style.display = "none";
        })


    </script>

    <script>
    
        $(document).ready(function(){
                var i = 1;
                <?php for ($i=1; $i < count($resul_stickers); $i++):?>
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" value="<?php echo $resul_stickers[$i]['1'];?>" placeholder="Enter sticker" class="form-control name_list" required></td><td><i name="remove" id="'+i+'" class="btn btn-danger btn-remove">-</i></td></tr>');    
                <?php endfor;?>
                $('#add').click(function(){
                    
                    if (i < 5) {
                        i++;
                        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" placeholder="Enter sticker" class="form-control name_list" required></td><td><i name="remove" id="'+i+'" class="btn btn-danger btn-remove">-</i></td></tr>');    
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
        previewImage.style.display ="block";
        previewDefaultText.style.display ="none";
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



    <!-- script para mandar a usuario a busqueda -->
    <?php if($signal): ?>
    <script>
        setTimeout(function(){
            window.location.href = 'modProd.php';
            }, 3000);
    </script>
    <?php endif;?>
     
		
</body>
</html>