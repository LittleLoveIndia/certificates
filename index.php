<?php

if(isset($_POST['search']))
{
    
    $id = $_POST['id'];
    
    
    $connect = mysqli_connect("45.84.204.103", "u331264672_certificate", "Password@certificate123","u331264672_vol");
    
    $query = "SELECT * FROM certlist WHERE ID = '$id'";
    
    $result = mysqli_query($connect, $query);
    

    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $Name = $row['Name'];
        $Work = $row['Work'];
        $Id = $row['ID'];
        $YR = $row['Year'];

      }  
    }
 
    else {
        echo "Undifined ID";
            $Name = "";
            $Work = "";
            $Id = "";
            $YR = "";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}
elseif(isset($_POST['print']))
{
    $id = $_POST['id'];
    
    
    $connect = mysqli_connect("45.84.204.103", "u331264672_certificate", "Password@certificate123","u331264672_vol");
    
    $query = "SELECT * FROM certlist WHERE ID = '$id'";
    
    $result = mysqli_query($connect, $query);
    

    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $Name = $row['Name'];
        $Work = $row['Work'];

        $YR = $row['Year'];

        $cername = isset($_GET["name"]) ? $_GET["name"] : $Name;
        $cerwork = isset($_GET["work"]) ? $_GET["work"] : $Work;
		// Create an image from the PNG that I have got.
		$image = imagecreatefrompng("empty.png");
		// Create a text colour.
		$textColour = imagecolorallocate($image, 0, 0, 0);
		// Get the font path.
		$fontPath = __DIR__ . "/font.otf";
		// Get the bounding box of the text.
        $coords = imagettfbbox(60, 0, $fontPath, $cername);
        $coordsw = imagettfbbox(60, 0, $fontPath, $cerwork);
		// Import the custom font from path.
		// Write text inside image.
		// Left margin should be negated with half width of the text.
		// Current text width is given by the above $coords, so divide it by 2.
        imagettftext($image, 60, 0, 1754 - ($coords[2] / 2), 1190, $textColour, $fontPath, $cername);
        imagettftext($image, 60, 0, 1754 - ($coordsw[2] / 2), 1460, $textColour, $fontPath, $cerwork);
		// Instruct the browser to read this page as image.
		header("Content-type: image/png");
		// Show the image to the browser or output.
		imagepng($image);
		// Destroy the image in the memory.
		imagedestroy($image);

}
}
}

else{
    $Name = "";
    $Work = "";
    $Id = "";
    $YR = "";
}


?>
    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8" />
        <title>Little Love Certificate Verification</title>
        <meta content="Little Love Certificate Verification" property="og:title" />
        <meta content="https://uploads-ssl.webflow.com/5e8ef3885097edc6dfff7ace/5e8ef44d5ee9cd4c4ef4d79b_logo%20horizontal-01.png" property="og:image" />
        <meta content="Little Love Certificate Verification" property="twitter:title" />
        <meta content="https://uploads-ssl.webflow.com/5e8ef3885097edc6dfff7ace/5e8ef44d5ee9cd4c4ef4d79b_logo%20horizontal-01.png" property="twitter:image" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Webflow" name="generator" />
        <link href="https://uploads-ssl.webflow.com/5e8782d9ab1cf842fb98ba0d/css/vanshs-business-starter.webflow.7b8c1b834.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
        <script type="text/javascript">
            WebFont.load({
                google: {
                    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
                }
            });
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163456291-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-163456291-2');
</script>
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
        <script type="text/javascript">
            ! function(o, c) {
                var n = c.documentElement,
                    t = " w-mod-";
                n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
            }(window, document);
        </script>
        <link href="https://littlelove.org.in/assets/img/Little-Love-01.svg" rel="shortcut icon" type="image/x-icon" />
        <link href="https://littlelove.org.in/assets/img/Little-Love-01.svg" rel="apple-touch-icon" />
        <style>
            table {
                border-collapse: collapse;
                border-spacing: 10%;
                padding: 10%;
                table-layout: fixed;
                width: 100% ;
            }
            
            table td,
            table th {
                border: 1px solid #000;
                border-spacing: 10%;
                padding: 10px;
                width: 25% ;
                text-align: center;
            }
            
            table tr:first-child th {
                border-top: 0;
            }
            
            table tr:last-child td {
                border-bottom: 0;
            }
            
            table tr td:first-child,
            table tr th:first-child {
                border-left: 0;
            }
            
            table tr td:last-child,
            table tr th:last-child {
                border-right: 0;
            }

        </style>

    </head>

    <body>
        <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="navigation w-nav">
            <div class="navigation-wrap">
                <a href="http://littlelove.org.in" class="logo-link w-nav-brand"><img src="https://uploads-ssl.webflow.com/5e8782d9ab1cf842fb98ba0d/5e87836fcce5fb09b4a3d71f_logo-horizontal-01.png" width="300" alt="" class="logo-image" /></a>
            </div>
        </div>
        <div class="section cc-store-home-wrap">
            <div class="intro-header">
                <div class="intro-content cc-homepage">
                    <div class="intro-text">
                        <div class="heading-jumbo">LITTLE LOVE</div>
                        <div class="paragraph-bigger cc-bigger-white-light">certificate verification</div>
                    </div>
                    <a href="#table" class="button cc-jumbo-button cc-jumbo-white w-inline-block">
                        <div>Verify</div>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="w-form">
                    <form action="index.php" method="post">
                        Id:<input type="text" class="w-input" name="id"><br><br>
                        <input type="submit" class="w-button" name="search" value="Find">
                        <input type="submit" class="w-button" name="print" value="Print">

                    </form>
                </div>
                <center>
                    <div id="tabledi">
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Work</th>
                                <th>ID</th>
                                <th>Year</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $Name;?>
                                </td>
                                <td>
                                    <?php echo $Work;?>
                                </td>
                                <td>
                                    <?php echo $Id;?>
                                </td>
                                <td>
                                    <?php echo $YR;?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </center>

                <div class="divider"></div>
            </div>
        </div>
        <div id="table">
            <div class="w-container"></div>
        </div>
        <div class="section">
            <div class="container">
                <div class="footer-wrap">
                    <a href="https://littlelove.org.in" target="_blank" class="webflow-link w-inline-block"><img src="https://uploads-ssl.webflow.com/5e8782d9ab1cf842fb98ba0d/5e87849abebe7d0e7bf8c8b9_only-logo.png" width="30" sizes="30px" srcset="https://uploads-ssl.webflow.com/5e8782d9ab1cf842fb98ba0d/5e87849abebe7d0e7bf8c8b9_only-logo-p-500.png 500w, https://uploads-ssl.webflow.com/5e8782d9ab1cf842fb98ba0d/5e87849abebe7d0e7bf8c8b9_only-logo.png 828w"
                            alt="" class="webflow-logo-tiny" />
                        <div class="paragraph-tiny">©2020 Little Love</div>
                    </a>
                </div>
            </div>
        </div>
        <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5e8782d9ab1cf842fb98ba0d" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="/home.js" type="text/javascript"></script>
            
        <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
    </body>

    </html>