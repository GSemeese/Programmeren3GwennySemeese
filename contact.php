<?php
session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta NAME="DESCRIPTION" CONTENT="Webdevelopment& Design Paal-Beringen. Ontwerpen van logo's, websites, ontwikkelen van CMS-systemen en onderhoud van website's">
<meta NAME="KEYWORDS" CONTENT="webdevelopment, development, developer, designer, webdesigner, design, Beringen, Paal, cms, cmssysteem, cms-systeem, ontwerpen, logo, logo's, onderhoud, webhosting">
<meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<meta NAME="REVISIT-AFTER" CONTENT="6 Days">
<title>Webdevelopment& design Ilinio - Contact</title>
<!-- webdevelopment, webdesign, beringen -->
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<link href="https://fonts.googleapis.com/css?family=Amaranth|El+Messiri" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>

<!-- Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89757400-3', 'auto');
  ga('send', 'pageview');

</script>

<!-- Facebook like button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="container">

	<header></header>
    
    <nav id="nav_bar">
        <ul class="nav_midden">
            <a href="index.html"><li>Wat doen we?</li></a>
            <a href="werkervaring.html"><li>CV</li></a>
            <a href="portfolio.html"><li>Portfolio</li></a>
            <a href="contact.php"><li class="actievePagina">Contact</li></a>
        </ul>
 	</nav>
    
    <main>
    	
        <h1>Contact</h1>
        <h2>Online contactformulier</h2>
        
        <?php
		
		$naam = $voornaam = $email = $onderwerp = $bericht = $captcha = "";
		$naamErr = $voornaamErr = $emailErr = $onderwerpErr = $berichtErr = $captchaErr = "";
    
            if($_SERVER['REQUEST_METHOD'] == "POST"){
				if (empty($_POST['naam'])){
					$naamErr = "Gelieve een naam op te geven";		
				} elseif(!preg_match("/^[a-zA-Z\s]*$/",$_POST['naam'])){
					$naamErr ="U mag enkel letters gebruiken";
				} else {
					$naam = ucwords($_POST['naam']);
				}
				
				if (empty($_POST['voornaam'])){
					$voornaamErr = "Gelieve een voornaam op te geven";		
				} elseif(!preg_match("/^[a-zA-Z]*$/",$_POST['voornaam'])){
					$voornaamErr ="U mag enkel letters gebruiken";
				} else {
					$voornaam = ucwords($_POST['voornaam']);
				}
				
				if (empty($_POST['email'])){
					$emailErr = "Gelieve een e-mailadres op te geven";		
				} elseif (!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Gelieve een geldig e-mailadres op te geven.";
				} else {
					$email = $_POST['email'];		
				}
				
				if (empty($_POST['onderwerp'])){
					$onderwerpErr = "Gelieve een onderwerp op te geven";
				} else {
					$onderwerp = $_POST['onderwerp'];
				}
				
				if (empty($_POST['bericht'])){
					$berichtErr = "Gelieve een bericht toe te voegen";
				} else {
					$bericht = "Dag Gwenny \n \n".$naam." ".$voornaam." heeft u volgend bericht gestuurd: \n\n\n".$_POST['bericht']."\n\n\n\n Antwoord op dit bericht via onderstaand emailadres:\n".$email;
				}
				
				if ($_POST['captcha'] == $_SESSION['captcha']){
					$captcha = true;
				} else {
					$captcha = false;
					$captchaErr = "Uw captcha was niet correct.";
				}
			               
                $ontvanger = "gwenny.semeese@ilinio.be";
                
                $headers = "From: info@ilinio.be"."\r\n";
                $headers .= "Reply-To: info@ilinio.be"."\r\n";
                $headers .= "CC: \r\n";
                
                
				
				if (empty($naamErr) and empty($voornaamErr) and empty($emailErr) and empty($onderwerpErr) and empty($berichtErr) and $captcha == true){
					mail($ontvanger, $onderwerp, $bericht, $headers);
					echo "<p>Uw bericht is verzonden.</p>";
            	} else {
					echo "<p>Er ging iets fout, uw bericht werd niet verzonden. Probeer opnieuw.</p>";
				}
			}
			
            ?>
        <table>
            <form action="contact.php" method="POST">
                <tr>
                	<td colspan="2" align="left">Gelieve alle velden in te vullen!</td>
                </tr>
                <tr>
                    <td>Naam:</td>
                    <td><input type="text" name="naam" value="<?php echo $naam; ?>"  size="40"></td>
                    <td><?php echo $naamErr; ?></td>
                </tr>
                <tr>
                    <td>Voornaam:</td>
                    <td><input type="text" name="voornaam" value="<?php echo $voornaam; ?>"  size="40"></td>
                    <td><?php echo $voornaamErr; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>"  size="40"></td>
                    <td><?php echo $emailErr; ?></td>
                </tr>
                <tr>
                    <td>Onderwerp:</td>
                    <td><input type="text" name="onderwerp" value="<?php echo $onderwerp; ?>"  size="40"></td>
                    <td><?php echo $onderwerpErr; ?></td>
                </tr>
                <tr>
                    <td>Bericht:</td>
                    <td><textarea cols="39" rows="12" name="bericht"></textarea></td>
                    <td><?php echo $berichtErr; ?></td>
                </tr>
                <tr>
                	<td colspan="2" align="center">Schrijf de cijferreeks uit te captcha over voordat u dit bericht kan verzenden.</td>
                </tr>
                <tr>
                	<td><img src="captcha.php"></td>
                    <td><input type="text" name="captcha" size="40"></td>
                    <td><?php echo $captchaErr; ?></td></tr>
                <tr>
                <tr>
                	<td colspan="2" align="right"><input type="submit" value="Bericht verzenden"></td>
            	</tr>
            </form>
        </table>
        
        <h2>Contactgegevens</h2>
        
        <p>Paalsesteenweg 278<br>
        3583 Paal (Beringen)<br>
        Tel. 011/38 07 03<br>
        Mob. 0498/971.328<br>
        Mail <a href="mailto:info@ilinio.be"><span class="actievePagina">info@ilinio.be</span></a><br>
        KBO <a href="http://kbopub.economie.fgov.be/kbopub/zoeknummerform.html?nummer=0673931056&actionLu=Zoek" target="_blank"><span class="actievePagina">0673.931.056</span></a>
        </p>
    
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64630.10582085834!2d5.140367816378345!3d51.049965033485535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c13a410b457055%3A0xe1e450c5cac3da95!2sPaalsesteenweg+278%2C+3583+Beringen!5e0!3m2!1snl!2sbe!4v1485167589207" 
        width="80%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    	
        <h2>Sociale media</h2>
        
        <p>Volg Ilinio ook op <a href="https://www.facebook.com/IlinioWebdevelopment/" target="_blank"><span class="actievePagina">facebook</span></a> en geef ons een like!<br>
        <div class="fb-like" data-href="http://ilinio.be/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div></p>
    </main>
	
    <footer>Designed by <a href="mailto:info@ilinio.be"><span class="actievePagina">&copy;Ilinio</span></a> - 
      <!-- #BeginDate format:Sw1 -->20 November, 2018<!-- #EndDate --></footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="JScript/navbar_fixed.js"></script>

</body>
</html>
