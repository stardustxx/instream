$(document).ready(function(){
  var searchField = $('#search');
  var container = $('#feed');
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

          timer = setTimeout(function() {
            instaSearch(); tweetSearch();
          }, 900);
     }
  });

  //tweetSearch
  function tweetSearch(){
    var tag = $(searchField).val();
    if(tag == ''){
      document.getElementById("feed").innerHTML = "PLEASE TYPE SOME SHITS";
    }else{
      var Tweeturl = 'get-tweets.php?tag='+tag;
      postRequest(Tweeturl);
    }
  }

  function instaSearch() {
    var tag = $(searchField).val();
    if(tag == ''){
      document.getElementById("feed").innerHTML = "PLEASE TYPE SOME SHITS";
    }else{
      var Instaurl = 'instasearch.php?tag='+tag;
      postRequest(Instaurl);
    }
  }

});

var result = "";

function updatepage(str){
  document.getElementById("container").innerHTML = str;
  var container = document.querySelector('#container');
  var msnry = new Masonry(container, {
    columnWidth: 200,
    itemSelector: '.item'
  });
}

function addToResult(str){
  var newResult = str + result;
  result = newResult;
  updatepage(result);
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


