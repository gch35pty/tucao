
//随机一个0~29的数
function random29(){
	return "portrait/"+Math.round(Math.random()*29)+".png";
}

//几分钟前、几小时前、几天前等时间差
function jsDateDiff(dateStr){
	var publishTime= new Date(dateStr.replace(/-/g,"/"))/1000;
   var d_minutes,d_hours,d_days;
   var timeNow = parseInt(new Date().getTime()/1000);
   var d;
   d = timeNow - publishTime;
   d_days = parseInt(d/86400);
   d_hours = parseInt(d/3600);
   d_minutes = parseInt(d/60);
   if(d_days>0 && d_days<4){
       return d_days+"天前";
   }else if(d_days<=0 && d_hours>0){
       return d_hours+"小时前";
   }else if(d_hours<=0 && d_minutes>0){
       return d_minutes+"分钟前";
   }else{
       var s = new Date(publishTime*1000);
       // s.getFullYear()+"年";
       return (s.getMonth()+1)+"月"+s.getDate()+"日";
   }
}
//几分钟前、几小时前、几天前等时间差
function jsDistanceDiff(distance){
	if (distance <= 1000) {
		distance = Math.ceil(distance/100)*100;
		return distance+"米以内";
	}
	distance = (distance/1000+0.1).toFixed(1);
	return distance+"公里以内";
}

function trim(str) {
	return str.replace(/(^\s*)|(\s*$)/g, "");
}

var cutStr = function(str, num) {
    var newStr = str;
    if(str.length > num) {
        newStr = str.substr(0,num-1)+"...";
    }
    return newStr;
};

function getPosition(functionFollow) {
	// onSuccess Callback
	// This method accepts a Position object, which contains the
	// current GPS coordinates
	//
	var onSuccess = function(positionNow) {
	    /*
		alert('Latitude: '          + position.coords.latitude          + '\n' +
					  'Longitude: '         + position.coords.longitude         + '\n' +
					  'Altitude: '          + position.coords.altitude          + '\n' +
					  'Accuracy: '          + position.coords.accuracy          + '\n' +
					  'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
					  'Heading: '           + position.coords.heading           + '\n' +
					  'Speed: '             + position.coords.speed             + '\n' +
					  'Timestamp: '         + position.timestamp                + '\n');*/
		position = positionNow;
		functionFollow();
	};
	
	// onError Callback receives a PositionError object
	//
	function onError(error) {
	    alert('code: '    + error.code    + '\n' +
	          'message: ' + error.message + '\n');
	}
	
	navigator.geolocation.getCurrentPosition(onSuccess, onError);
}
    