<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="story">
  <div id='storyTitle'>
    <h2><xsl:value-of select="title"/></h2>
  </div>
    <!-- <xsl:apply-templates select="cast"/> -->
    <xsl:apply-templates select="text"/>

</xsl:template>


<xsl:template match="text">
  <div class="text">
    <xsl:for-each select=".">
      <xsl:apply-templates/>
    </xsl:for-each>

    </div>
</xsl:template>




<xsl:template match="text/normal">
    <div class="normalText">
      <p>
        <xsl:value-of select="."/>
      </p>

    </div>
</xsl:template>


<xsl:template match="abstract">
    <div class="abstract">
      <h3 class="abstractTitle">Abstract</h3>
      <p>
      <xsl:value-of select="."/>
    </p>
    </div>
</xsl:template>

<xsl:template match="aside">
  <div class="aside">
    <!-- <h3>Aside</h3> -->
    <p>
    <xsl:value-of select="."/>
  </p>

  </div>
</xsl:template>

<xsl:template match="branch">
  <div class="selectBranch">
    <h3 id="branchTitle">Branching Options</h3>
    <xsl:for-each select="branch/option">

      <div class="branchOption"><xsl:value-of select="."/>
    </div>

    </xsl:for-each>
    </div>
</xsl:template>

</xsl:stylesheet>
