<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<!-- ============================================================= -->
<!--  MODULE:   offcial papal announcements                        -->
<!--  VERSION:  1.0                DATE: 2015/03                   -->
<!-- ============================================================= -->

<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" exclude-result-prefixes="">
  <xsl:output encoding="UTF-8" method="xml" indent="yes" omit-xml-declaration="no" />

  <xsl:template match="/">
    <xsl:text disable-output-escaping='yes'>&lt;!DOCTYPE html&gt;
</xsl:text>
	<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta charset="utf-8"/>
    	<title>Habemus Papam, offcial</title>
		<link rel="stylesheet" type="text/css" href="commom.css"/>
    </head> 
    <body>
    	<h1>Official papal announcements</h1>    	
		<xsl:apply-templates select="//row"/>
    </body>
    </html>
  </xsl:template>

  <xsl:template match="row">
	<h2><xsl:value-of select="@familyName"/>, <xsl:value-of select="@givenName"/></h2>
	<div class="row">
		<div class="comments">
	  		<p>Moved to new address,
		  		<br/> &#160; <tt>00120 Via del Pellegrino - Citta del Vaticano</tt>
	  			<br/>and was re-baptized to &#160;<span class="pname"><xsl:value-of select="@papalName_it"/></span>&#160; 
		  		(english&#160;<i><xsl:value-of select="@papalName_en"/></i>,
		  		spansh&#160;<i><xsl:value-of select="@papalName_es"/></i>)
		  		<br/>... as say in this <b><xsl:value-of select="@day"/>, 
		  		<xsl:value-of select="@year"/></b> official announcement.
			</p>
		</div>
	 	<div class="announcement">
			<p>Annuntio vobis gaudium magnum;
				<br/> habemus Papam:
			</p>
			<p>Eminentissimum ac Reverendissimum Dominum,
				<br/>Dominum <i><xsl:value-of select="@givenName_la_accus"/></i>
				<br/>Sanctae Romanae Ecclesiae <xsl:value-of select="@honorificPrefix_la"/>
					<i><xsl:value-of select="@familyName_la_undecl"/></i>
				<br/>qui sibi nomen imposuit <i><xsl:value-of select="@papalName_la_genit"/></i>
			</p>
		</div>
	</div>
  </xsl:template>

</xsl:transform>
