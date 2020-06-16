<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="story">
  <h2>Meta Data</h2>
  <xsl:apply-templates select="cast"/>


</xsl:template>

<xsl:template match="cast">
  <div class="cast">
    <h3>Cast</h3>
    <xsl:apply-templates select="group"/>
    <xsl:apply-templates select="character"/>
  </div>
</xsl:template>

<xsl:template match="group">
  <h4>Group: <xsl:value-of select="."/></h4>
</xsl:template>
<xsl:template match="character">
  <h4>Character: <xsl:value-of select="."/></h4>
</xsl:template>

</xsl:stylesheet>
