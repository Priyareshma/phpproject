<?php
    $folderPath = "upload/";
    $image_parts = explode(";base64,", $_POST['signed']); 
    //print_r (explode(";base64,", $_POST['signed']));
    $image_type_aux = explode("image/", $image_parts[0]);
    //print_r (explode("image/", $image_parts[0]));
    $image_type = $image_type_aux[1];  
    $image_base64 = base64_decode($image_parts[1]);
    $file = $folderPath . uniqid() . '.'.$image_type; 
    file_put_contents($file, $image_base64);
?>
<html>
        <center><table border="1">
             <tr>
                 <th>Signature Image</th></tr>
            <tr><td> <img src="<?php echo $file; ?>"></td></tr>
            </table></center>
</html>