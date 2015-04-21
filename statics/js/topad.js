// JScript 文件
function TopAd()
{
    var strTopAd="";
	//定义小图片内容
    var topSmallBanner="<div><a href=\"http://ah.anhuinews.com/system/2015/04/10/006751590.shtml\" target=_blank><img src=\"/statics/images/b2.jpg\" /></a></div>";
	//定义大图内容
    strTopAd="<div id=adimage style=\"width:980px\">"+
                "<div id=adBig><a href=\"http://www.51xuediannao.com/\" " + 
                "target=_blank><img"+
                "src=\"images/top_lanrentuku_b.jpg\" " +
                "border=0></A></div>"+
                "<div id=adSmall style=\"display: none\">";
    //strTopAd+=  topFlash;     
	// strTopAd+=  topSmallBanner;  
    strTopAd+=  "</div></div>";
    
    strTopAd+="<div style=\"height:7px; clear:both;overflow:hidden\"></div>";
    return strTopAd;
}
$("#ad").html(TopAd());
$(function(){
    setTimeout("showImage();",2000);
});
function showImage()
{
    $("#adBig").slideUp(1000,function(){$("#adSmall").slideDown(1000);});
}

