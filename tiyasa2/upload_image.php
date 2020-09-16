<html>

<head>
    <title>Form Upload Gambar</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
    <script src="dist_files/jquery.form.js"></script>
    <link rel="stylesheet" href="dist_files/imgareaselect.css">
    <script src="functions.js"></script>
    <style>
    body {
        background-repeat: no-repeat;
        background-image: url("images/am.jpg");
        background-position: vertical;
        height: 100%;
        width: 100%;
        /* filter: blur(5px);
       -webkit-filter: blur(5px);*/

    }

    #card {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 480px;
        margin: 6rem auto 8.1rem auto;
        width: 329px;
    }

    #card-content {
        padding: 12px 44px;
    }

    #card-title {
        font-family: "Raleway Thin", sans-serif;
        letter-spacing: 4px;
        padding-bottom: 23px;
        padding-top: 13px;
        text-align: center;
        position: center;
    }

    .container {
        width: 400px;
        height: 200px;
        padding: 20px;
        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -120px;
        margin-left: -220px;
    }

    .box {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
    }

    .underline-title {
        background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
        height: 2px;
        margin: -1.1rem auto 0 auto;
        width: 89px;
    }
    </style>

</head>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=735461323279579";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<body>
    <div class="container">
        <div class="box">
            <h2 align="center">FORM UPLOAD GAMBAR</h2>

            <br><br>

            <a type="button" align="center" class="btn btn-primary" id="change-pic">Ganti Foto</a>
            <br><br>
            <a type="button" align="center" href="index.html" class="btn btn-primary" id="back">Kembali</a>
            <br><br>

        </div>
    </div>

    <!--modal-->
    <div id="profile_pic_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Ganti Foto</h3>
                </div>
                <div class="modal-body">
                    <form id="cropimage" method="post" enctype="multipart/form-data" action="ganti_foto.php">
                        <strong>Lokasi gambar:</strong> <br><br>
                        <select name="TempatGambar">
                            <option value="Menu_Tiyasa-02">Snack</option>
                            <option value="Menu_Tiyasa-03">Food</option>
                            <option value="Menu_Tiyasa-04">Drink</option>
                            <option value="Menu_Tiyasa-05">Drink and Dessert</option>
                        </select>
                        <br><br>
                        <h6>Gambar Full :</h6> <input type="file" name="gambar" id="gambar" />
                        <h6>Gambar Cover :</h6><input type="file" name="pic" id="pic" />
                        <input type="hidden" name="hdn-id" id="hdn-id" value="1" />
                        <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                        <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                        <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                        <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                        <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                        <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                        <input type="hidden" name="action" value="" id="action" />
                        <input type="hidden" name="image_name" value="" id="image_name" />

                        <div id='preview-pic'></div>
                        <div id="thumbs" style="padding:5px; width:600p"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="save_crop" name="submit" class="btn btn-primary">Crop &amp;
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>