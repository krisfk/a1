更新事項：

1.index.html內的notice請在scroll_headline.html修改

2.index.html內的學校簡介請在intro.html修改

3.index.html內的推廣活動請在event.html修改，請用code修改
example:
<li>
 	    <img src="img/company/banner/banner_0001.jpg" /> <--修改位置
</li>
圖片位置-->D:\MEG\Dropbox\web\templategarden-ascend\img\company\banner

如要新增圖，請copy上面的code，更改圖片，然後貼在</li>下面

4.index.html內的名人學車請在star.html修改
修改請跟3.
圖片位置-->D:\MEG\Dropbox\web\templategarden-ascend\img\company\stars

5.index.html內的指定夥伴請在cooperation.html修改

6.index.html內的就業機會請在job.html修改，請用code修改
如要新增，請在CODE內找<ul id="tabs">
將<li>新增職業</li>貼在</li>後面
然後copy <!--job-->至<!--/job-->之間的內容，貼在<!--/job-->下面

7.index.html內的社交平台連結請在js/jquery-func.js
example:
$("#twitter").click(function(){
	window.open('https://twitter.com/'); <--修改連結
}); 