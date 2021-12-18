<!DOCTYPE html>
<html>
<head>
    <title>Signature Pad</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="asset/jquery.signature.min.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/jquery.signature.css">
    <style>
        .kbw-signature { width: 400px; height: 100px;}
        #sig canvas{
            width: 100%;
            height: auto;
        }
    </style>
  
</head>
<body>
<div class="container">
    <form method="POST" action="upload.php">
        <h4><b>Signature Pad</b></h4>
        <div class="col-md-12">
            <label class="" for="">Draw your Signature:</label>
            <br/>
            <div id="sig"></div>
            <br/>
            <button id="clear" class="btn btn-danger">Clear Signature</button>
            <textarea id="signaturetextarea" name="signed" style="display: none"></textarea>
            <button class="btn btn-success">Save</button>
        </div>
    </form>  
</div> 
<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signaturetextarea', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signaturetextarea").val('');
    });
</script>
    
    
    </body>
</html>

