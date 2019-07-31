<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>xoogle : Search</title>
    <link rel="shortcut icon" href="/images/icons/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/xoogle.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/css/browse_search.css" />
  </head>

  <body>
    <br /> 
    <div class="main_page">

      <div class="page_header floating_element">
        <a href="http://xoogle" target="_xoogle" ><img src="/images/bitlogo.jpg" alt="Logo" class="floating_element" width="128" /></a>
        <span class="floating_element">  xoogle search </span>
      </div>

    <div>
    <br />&nbsp;<br />&nbsp;<br />
    <form name="Q" method="get" action="/search" target="_search">
    <center>
        <input id="omega-autofocus" type="search" name="q" value="<?php echo $_GET["q"] ?>" size="65" autofocus="1" />
	<script>
if (!("autofocus" in document.createElement("input")))
 document.getElementById("omega-autofocus").focus();
        </script>
        <input type="submit" value="Search" />
        <br /><br />
        <input type="radio" name="DEFAULTOP" value="or" /> Matching any words
        <input type="radio" name="DEFAULTOP" value="and" checked="1" /> Matching all words
	<br />
    </center>
    <br />
        <input type="hidden" name="DB" value="xoogle" />
	<input type="hidden" name="FMT" value="query" />
        <input type="hidden" name="xDB" value="xoogle" />
	<input type="hidden" name="xFILTERS" value=".~~" />
    </form>
    </div>

      <div class="content_section floating_element">
        <br />
      </div>


<?php
$query = str_replace(' ', '+', $_GET["q"] );
$url='http://xoogle/cgi-bin/omega/omega?P='.$query.'&DEFAULTOP='.$_GET["DEFAULTOP"].'&DB=xoogle&FMT=query&xDB=xoogle&xFILTERS=.~~';

$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    
    $xmlstr = curl_exec($curl);
    curl_close($curl);
    $results = new SimpleXMLElement($xmlstr);

echo "<br /><br /><br /><br />";

    foreach ($results->topterms->topterm as $topterm) {
	$row = $topterm->attributes();
	echo "<a href='http://xoogle/search?q=" . $row['term'] . "'><b>" .$row['term']. "</b></a>, ";
    }
echo "<br /><br /><br />";
echo "<div class='content_section_text2'>";
    foreach ($results->hits->hit as $hit) {
	echo "<br /><hr /><br />";
	$row = $hit->attributes();
	echo "<a href='" . $row['url'] . "'><h3>" .$row['title']. "</h3></a>";
	echo "<br />";
	echo "<a href='" . $row['url'] . "'>" .$row['example']. "</a>";
	echo "<br />";
    }

echo "</div>";

echo "<br /><br />";
echo "<a href='$url' target='_xml'>xml</a>";
?>

    </div>
</body>
</html>
