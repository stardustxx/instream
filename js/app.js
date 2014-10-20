var tweetSearch;
var instaSearch;

$(document).ready(function(){
  var searchField = $('#search');
  var timer;

  //tweetSearch
  tweetSearch = function(){
    var tag = $(searchField).val();
    if(tag == ''){
      document.getElementById("container").innerHTML = "PLEASE TYPE SOME SHITS";
    }else{
      var Tweeturl = 'get-tweets.php?tag='+tag;
      postRequest(Tweeturl);
    }
  }

  instaSearch = function() {
    var tag = $(searchField).val();
    if(tag == ''){
      document.getElementById("container").innerHTML = "PLEASE TYPE SOME SHITS";
    }else{
      var Instaurl = 'instasearch.php?tag='+tag;
      postRequest(Instaurl);
    }
  }

});

var result = "";

function updatepage(){
  instaSearch();
  //tweetSearch();
  document.getElementById("container").innerHTML = result;
  console.log("updated @" + Date());
  var con = document.querySelector('#container');
  var msnry = new Masonry(con, {
    itemSelector: '.item'
  });
}

function addToResult(str){
  var newResult = str + result;
  result = newResult;
}

function postRequest(strURL) {
 var xmlHttp;
 if (window.XMLHttpRequest) {
   // Mozilla, Safari, ...
   var xmlHttp = new XMLHttpRequest();
   } else if (window.ActiveXObject) {
   // IE
   var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
   }

   xmlHttp.open('POST', strURL, true);

   xmlHttp.setRequestHeader('Content-Type',
        'application/x-www-form-urlencoded');

   xmlHttp.onreadystatechange = function() {
       if (xmlHttp.readyState == 4) {
           addToResult(xmlHttp.responseText);
       }
   }

   xmlHttp.send(strURL);
}

//keep loading
function load(){
  setInterval(updatepage, 30000);
}

//declare loading
function loading(){
  result = "";
  document.getElementById("container").innerHTML = "LOADING...";
}
