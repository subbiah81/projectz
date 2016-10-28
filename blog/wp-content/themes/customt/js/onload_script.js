$(document).ready(function() {
$.ajax({
  url      : 'http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=100&callback=?&q=' + encodeURIComponent('http://xml.fxstreet.com/index.xml'),
  dataType : 'json',
  success  : function (data) {
    if (data.responseData.feed && data.responseData.feed.entries) {
	var newsfeedcount = 1;
      $.each(data.responseData.feed.entries, function (i, e) {
		if ( /[A-Z]{3}\/?[A-Z]{3}/.test (e.title) ) {
		document.getElementById("newsfeed" + newsfeedcount).innerHTML = e.title;
		document.getElementById("newsfeed" + newsfeedcount).href = e.link;
		var dateDisplay = new Date(e.publishedDate);
		document.getElementById("newsfeeddate" + newsfeedcount).innerHTML = dateDisplay.toLocaleString();
        //console.log("------------------------");
		//console.log("Return: " + e.title.search(/[A-Z]{3}\/?[A-Z]{3}/) );
		newsfeedcount++;
		}
      });
    }
  }
});

// Fill privacy policy modal with content from outside html
$("#privacyModal").on("show.bs.modal", function(e) {
    $(this).find(".modal-body").load("privacy_policy.html");
});

});
