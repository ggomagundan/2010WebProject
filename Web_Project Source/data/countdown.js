
CNTDWN = [];
ITID = 0;

$(function(){
  initCounters();

});

function initCounters()
{
  var cnt = [];
  $("div.city-block").each(function(){
    var ts;
    var classes = this.className.split(" ");
    for(var a in classes)
    {
      if(classes[a].indexOf("timeto-")==0) {
        ts = classes[a].split("timeto-").join("");
      }
    }
    
    cnt[cnt.length] = {element: $(".city-timeto", $(this)), time: ts};
  });
  CNTDWN = cnt;
  downTime();
  ITID = setInterval(downTime, 1000);
  
}

NOW = new Date().getTime()/1000;


function downTime()
{
     // document.write("Now is "+ NOW + "\n");
  for(var a = 0; a < CNTDWN.length; a++)
  {
    //CNTDWN[a].time-=1;
    CNTDWN[a].element.text( timeString( CNTDWN[a].time ) );
  }
  NOW++;
}


function timeString( ts )
{
  var timeLeft = ts-NOW;
 // document.write(ts + " - "+NOW+"\n"); 
  //document.write(timeLeft + "   " +  new Date("2010-11-15 20:00").getTime()/1000);
  if(timeLeft<=0)
  {
    return "NOW !";
  }
  
    var seconds  = (timeLeft / 1)>>0;
	var minutes  = (seconds / 60)>>0;
	var hours    = (minutes / 60)>>0;
	//var days     = (hours / 24)>>0;
	
	seconds %= 60; seconds = (seconds>9) ? seconds : "0"+seconds;
	minutes %= 60; minutes = (minutes>9) ? minutes : "0"+minutes;
	//hours %= 24;
	hours   = (hours>9)   ? hours   : "0"+hours;
	
	return hours+":"+minutes+":"+seconds
}