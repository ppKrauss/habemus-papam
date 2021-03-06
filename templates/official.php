<!DOCTYPE html>
<!-- ============================================================= -->
<!--  MODULE:   offcial papal announcements, PHP template          -->
<!--  VERSION:  1.0                DATE: 2015/03                   -->
<!-- ============================================================= -->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta charset="utf-8"/>
    	<title>Habemus Papam, offcial</title>
		<link rel="stylesheet" type="text/css" href="commom.css"/>
    </head> 
    <body>
      <h1>Official papal announcements</h1>
      <?php
    	foreach ($input as $row):
      ?>
		<h2><?= $row['familyName']?>, <?= $row['givenName']?></h2>
		<div class="row">
			<div class="comments">
		  		<p>Moved to new address,
			  		<br/> &#160; <tt>00120 Via del Pellegrino - Citta del Vaticano</tt>
		  			<br/>and was re-baptized to &#160;<span class="pname"><?= $row['papalName_it']?></span>&#160; 
			  		(english&#160;<i><?= $row['papalName_en']?></i>,
			  		spansh&#160;<i><?= $row['papalName_es']?></i>)
			  		<br/>... as say in this <b><?= $row['day']?>, 
			  		<?= $row['year']?></b> official announcement.
				</p>
			</div>
		 	<div class="announcement">
				<p>Annuntio vobis gaudium magnum;
					<br/> habemus Papam:
				</p>
				<p>Eminentissimum ac Reverendissimum Dominum,
					<br/>Dominum <i><?= $row['givenName_la_accus']?></i>
					<br/>Sanctae Romanae Ecclesiae <?= $row['honorificPrefix_la']?>
						<i><?= $row['familyName_la_undecl']?></i>
					<br/>qui sibi nomen imposuit <i><?= $row['papalName_la_genit']?></i>
				</p>
			</div>
		</div>
      <?php
    	endforeach;
      ?>
    </body>
    </html>
