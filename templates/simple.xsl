<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<!-- ============================================================= -->
<!--  MODULE:   simplifyed papal announcements                     -->
<!--  VERSION:  1.0                DATE: 2015/03                   -->
<!-- ============================================================= -->

<xsl:transform version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
	xmlns:fn="http://php.net/xsl" exclude-result-prefixes="fn"
>
  <xsl:output encoding="UTF-8" method="xml" indent="yes" omit-xml-declaration="no" />

  <xsl:template match="/">
    <xsl:text disable-output-escaping='yes'>&lt;!DOCTYPE html&gt;
</xsl:text><html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
		<meta charset="utf-8"/>
    	<title>Habemus Papam, offcial</title>
    	<style type="text/css">
		div.row{    
			display: table;
			width: 100%;
		}
		.comment {
			width: 50%;
		    display: table-cell;
		    vertical-align: middle;
			font-size: 13pt;
		    padding: 12pt 12pt 12pt 12pt;		
		}
		.announcement {
			width: 50%;		
		    display: table-cell;
		    vertical-align: middle;
			font-family: Arial;
			font-size: 13pt;
			color: #036;
			text-align:left;
		    padding: 6pt;
		    border: 1px dotted #036;
		    margin: 6pt;
		}
		p { text-align:left }
		.pname { font-style: italic; font-size: 120%; }

    	</style> 
    </head> 
    <body>
    	<h1>Simplifyed papal announcements</h1>
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
			<p>I announce to you a great joy;
				<br/> We have a Pope:
			</p>
			<p>The most eminent and most reverend Lord,
				<br/>the Lord <i><xsl:value-of select="@givenName"/></i>
				<br/>Cardinal of the Holy Roman Church <i><xsl:value-of select="@familyName"/></i>
				<br/>who takes to himself the name of  <i><xsl:value-of select="@papalName_en"/></i>
			</p>
		</div>
	</div>
  </xsl:template>

</xsl:transform>
