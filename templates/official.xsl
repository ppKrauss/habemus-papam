<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<!-- ============================================================= -->
<!--  MODULE:   offcial papal announcements                        -->
<!--  VERSION:  1.0                DATE: 2015/03                   -->
<!-- ============================================================= -->

<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
	xmlns:fn="http://php.net/xsl" exclude-result-prefixes="fn"
>
  <xsl:output encoding="UTF-8" method="xml" indent="yes" omit-xml-declaration="no" />

  <xsl:template match="/">
    <xsl:text disable-output-escaping='yes'>&lt;!DOCTYPE html></xsl:text>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
    	<title>Habemus Papam, offcial</title>
    	<style type="text/css">
		.announcement {
			font-family: Arial;
			font-size: 14pt;
			color: #630;
			text-align:left;
		    padding: 14pt;
		    border: 1px dotted navy;
		    margin: 14pt;
		}
		p { text-align:left }
    	</style> 
    </head> 
    <body>
		<xsl:apply-templates select="//row"/>
    </body>
    </html>
  </xsl:template>

  <xsl:template match="row">
	<h2><xsl:value-of select="year">, <xsl:value-of select="day"></h2>
		<div class="announcement">
		<p>Annuntio vobis gaudium magnum;
			<br/> habemus Papam:
		</p>
		<p>Eminentissimum ac Reverendissimum Dominum,
			<br/>Dominum <i><xsl:value-of select="givenName_la_accus"></i>
			<br/>Sanctae Romanae Ecclesiae <xsl:value-of select="honorificPrefix_la">
				<i><xsl:value-of select="familyName_la_undecl"></i>
			<br/>qui sibi nomen imposuit <i><xsl:value-of select="papalName_la_genit"></i>
		</p>
	</div>
  </xsl:template>

</xsl:transform>
