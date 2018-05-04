<!-- contex menu click deerecho -->
<script src="<?php echo BASE; ?>public/template/desktop/js/subview/subview.js" type="text/javascript"></script>
<style>
/* ---------------------------------------------------------------------- */
/*  Subview
/* ---------------------------------------------------------------------- */
/* line 4, ../sass/partials/_subview.scss */
.subviews {
  background-color: #FFFFFF;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 501;
  display: none;
  overflow-y: auto;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

/* line 14, ../sass/partials/_subview.scss */
.subviews-top {
  height: 0;
  left: 0;
}

/* line 18, ../sass/partials/_subview.scss */
.subviews-right {
  width: 0;
  left: auto;
  right: 0;
}

/* line 23, ../sass/partials/_subview.scss */
.barTopSubview {
  text-align: center;
  margin-bottom: 20px;
}

/* line 27, ../sass/partials/_subview.scss */
.button-sv {
  border: 1px solid #DDDDDD;
  border-top: none;
  line-height: 40px;
  height: 40px;
  text-align: center;
  background-color: #FFFFFF;
  display: inline-block;
  padding: 0 20px;
  color: #858585;
  filter: alpha(opacity=80);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
  -moz-opacity: 0.8;
  -khtml-opacity: 0.8;
  opacity: 0.8;
}
/* line 38, ../sass/partials/_subview.scss */
.button-sv:hover {
  color: #858585;
  filter: alpha(opacity=100);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  -moz-opacity: 1;
  -khtml-opacity: 1;
  opacity: 1;
  text-decoration: none;
}

/* line 45, ../sass/partials/_subview.scss */
.close-subviews, .back-subviews {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  color: #111111;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 0;
  line-height: 31px;
  margin-right: 3px;
  margin-top: 2px;
  opacity: 0.9;
  padding: 8px 0 7px 0;
  position: relative;
  text-align: center;
  width: 90px;
  float: right;
  left: 20px;
  -moz-transition-property: left;
  -o-transition-property: left;
  -webkit-transition-property: left;
  transition-property: left;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  -webkit-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -moz-transition-timing-function: ease-in;
  -o-transition-timing-function: ease-in;
  -webkit-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  filter: alpha(opacity=0);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  -moz-opacity: 0;
  -khtml-opacity: 0;
  opacity: 0;
  display: none;
}

/* line 67, ../sass/partials/_subview.scss */
.back-subviews {
  left: 110px;
}

/* line 70, ../sass/partials/_subview.scss */
.close-subviews > i, .back-subviews > i {
  display: block;
  margin-top: 12px;
  color: #111111;
  font-size: 16px;
}

/* line 76, ../sass/partials/_subview.scss */
.close-subviews:hover, .close-subviews:focus, .back-subviews:hover, .back-subviews:focus {
  background-color: #EEEEEE;
  color: #111111;
  text-decoration: none;
}

/* line 81, ../sass/partials/_subview.scss */
#newNote {
  display: none;
}

/* line 85, ../sass/partials/_subview.scss */
.note-title {
  background-color: transparent;
  border: none !important;
  color: #111111;
  font-size: 20px;
  font-weight: 600;
  height: 40px;
  z-index: 103;
  padding: 0 !important;
}

/* line 95, ../sass/partials/_subview.scss */
.note-title:focus {
  border-color: none !important;
  box-shadow: none !important;
}

/* line 101, ../sass/partials/_subview.scss */
#notes .note-content {
  display: none;
}

/* line 104, ../sass/partials/_subview.scss */
#notes .note-short-content p {
  margin: 0;
}

/* line 107, ../sass/partials/_subview.scss */
#notes .note-short-content h1, #notes .note-short-content h2, #notes .note-short-content h3 {
  font-size: 13px;
  margin: 0;
  line-height: 20px;
}

/* line 112, ../sass/partials/_subview.scss */
#readNote {
  display: none;
}

/* line 115, ../sass/partials/_subview.scss */
#readNote .panel-note {
  box-shadow: none;
}

/* line 118, ../sass/partials/_subview.scss */
#readNote .panel-note .panel-heading {
  background: none;
}

/* line 121, ../sass/partials/_subview.scss */
#readNote .note-short-content {
  display: none;
}

/* line 124, ../sass/partials/_subview.scss */
#readNote .note-content p {
  margin: 0 0 18px 0;
}

/* line 127, ../sass/partials/_subview.scss */
#readNote .note-content h1, #readNote .note-content h2, #readNote .note-content h3 {
  font-size: 13px;
  margin: 0;
  line-height: 20px;
}

/* line 132, ../sass/partials/_subview.scss */
#readNote .noteslider {
  display: none;
}

/* line 135, ../sass/partials/_subview.scss */
#readNote .noteslider .slides > li {
  display: none;
}

/* line 138, ../sass/partials/_subview.scss */
#readNote .flex-direction-nav {
  position: absolute;
  top: 10px;
  right: 10px;
}

/* line 143, ../sass/partials/_subview.scss */
#readNote .read-note {
  display: none;
}

/* line 146, ../sass/partials/_subview.scss */
#showCalendar {
  display: none;
}

/* line 149, ../sass/partials/_subview.scss */
#newEvent {
  display: none;
}

/* line 152, ../sass/partials/_subview.scss */
#readEvent {
  display: none;
}

/* line 155, ../sass/partials/_subview.scss */
#readEvent .event-content {
  background: url("../images/line.png");
  color: #858585;
  line-height: 18px;
  margin: 15px 0 0 0;
  padding: 0;
}

/* line 162, ../sass/partials/_subview.scss */
#readEvent .event-start, #readEvent .event-end {
  color: #858585;
  margin: 15px 0 0 0;
  padding: 10px;
  margin-top: 20px;
  background: #EEEEEE;
}

/* line 169, ../sass/partials/_subview.scss */
#readEvent .event-allday {
  color: #858585;
}

/* line 172, ../sass/partials/_subview.scss */
#readEvent .event-allday i {
  color: #00AAFF;
}

/* line 175, ../sass/partials/_subview.scss */
#readEvent .event-start p, #readEvent .event-end p {
  margin: 0 0 5px 0;
}

/* line 178, ../sass/partials/_subview.scss */
#readEvent .event-day h2, #readEvent .event-date h3, #readEvent .event-date h4 {
  margin: 0;
  padding: 0;
}

/* line 182, ../sass/partials/_subview.scss */
#readEvent .event-day h2 {
  font-size: 45px;
  line-height: 30px;
  margin-right: 5px;
}

/* line 187, ../sass/partials/_subview.scss */
#readEvent .event-date h3 {
  font-size: 15px;
  line-height: 20px;
}

/* line 191, ../sass/partials/_subview.scss */
#readEvent .event-date h4 {
  font-size: 12px;
}

/* line 194, ../sass/partials/_subview.scss */
#readEvent .event-day, #readEvent .event-date, #readEvent .event-time {
  display: inline-block;
}

/* line 197, ../sass/partials/_subview.scss */
#readEvent .event-time {
  margin-left: 20px;
}

/* line 200, ../sass/partials/_subview.scss */
#readEvent .event-time h3 {
  margin: 0;
  padding: 0;
  font-size: 12px;
}

/* line 205, ../sass/partials/_subview.scss */
#readEvent .event-category:before {
  line-height: 18px;
  padding-right: 0;
}

/* line 209, ../sass/partials/_subview.scss */
#newContributor {
  display: none;
}

/* line 212, ../sass/partials/_subview.scss */
#showContributors {
  display: none;
}

/* line 215, ../sass/partials/_subview.scss */
#contributors .bootstrap-select:not([class*="span"])
:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
  width: auto;
}

/* line 219, ../sass/partials/_subview.scss */
.contributor-avatar .fileupload-preview {
  max-width: 50px;
  max-height: 50px;
  line-height: 20px !important;
}

/* line 224, ../sass/partials/_subview.scss */
.contributor-avatar .contributor-avatar-options {
  display: inline-block;
  margin-left: 10px;
}
</style>
<script>
var UISubview = function() {
	"use strict";
	//function to initiate bootstrap extended modals
	var initSubview = function() {
		$(".sv-callback1").on("click", function() {
					$.subview({
						content: "#example-subview-1",
						onShow: function() {
							bootbox.alert("Do something when the subview is shown!");
						}
					});
				});
		$(".sv-callback2").on("click", function() {					
			$.subview({
				content: "#example-subview-1",
				startFrom: "right",
				onClose: function() {
					bootbox.confirm("Are you sure you want to close subview?", function(result) {
						if(result) {
							$.hideSubview();
						};
					});						
				}
			});
		});
		$(".sv-callback3").on("click", function() {
			$.subview({
				content: "#example-subview-1",
				startFrom: "right",
				onHide: function() {
					bootbox.alert("Do something when the subview is hidden!");
				}
			});
		});
	};
	return {
		init : function() {
			initSubview();
		}
	};
}(); 
</script>
