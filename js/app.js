var tweetSearch;
var instaSearch;

$(document).ready(function(){
  var searchField = $('#search');
  var timer;

    /**
   * keycode glossary
   * 32 = SPACE
   * 188 = COMMA
   * 189 = DASH
   * 190 = PERIOD
   * 191 = BACKSLASH
   * 13 = ENTER
   * 219 = LEFT BRACKET
   * 220 = FORWARD SLASH
   * 221 = RIGHT BRACKET
   */

  $(searchField).keydown(function(e){
    if(e.keyCode == '32' || e.keyCode == '188' || e.keyCode == '189' || e.keyCode == '13' || e.keyCode == '190' || e.keyCode == '219' || e.keyCode == '221' || e.keyCode == '191' || e.keyCode == '220') {
       e.preventDefault();
     } else {
          clearTimeout(timer);
          loading();
          timer = setTimeout(function() {
            //instaSearch();
            tweetSearch();
          }, 900);
     }
  });

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
  //instaSearch();
  tweetSearch();
}

function mason(){
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
  mason();
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
