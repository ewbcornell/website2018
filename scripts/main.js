// from http://stackoverflow.com/questions/19462672/jquery-detect-bootstrap-3-state
function findBootstrapEnvironment() {
    var envs = ["ExtraSmall", "Small", "Medium", "Large"];
    var envValues = ["xs", "sm", "md", "lg"];

    var $el = $('<div>');
    $el.appendTo($('body'));

    for (var i = envValues.length - 1; i >= 0; i--) {
        var envVal = envValues[i];

        $el.addClass('hidden-'+envVal);
        if ($el.is(':hidden')) {
            $el.remove();
            return envValues[i]
        }
    };
}

function getperrow() {
  var size = findBootstrapEnvironment();
  if( size === 'xs' ) {
      return 2;
  }
  if( size === 'sm' ) {
      return 3;
  }
  if( size === 'md' ) {
      return 4;
  }
  if( size === 'lg' ) {
      return 5;
  }
}

// function collapseAllBut(ref, total) {
//   $.ajax({
//     url: "ajax/member_detail.php",
//     method: 'POST',
//     data: {id: ref},
//     cache: false,
//     dataType: 'json',
//     error: function(error) {
//       console.log(error);
//     }
//   })
//   .done(function(result) {
//     var perrow = getperrow();
//     var after = Math.min((Math.floor((ref-1)/perrow)+1)*perrow, total);
//     if ($('.member-detail').data('id') == ref) {
//       $('.member-detail').remove();
//     } else {
//       $('.member-detail').remove();
//       var content = "<div class='member-detail' data-id='"+ref+"'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 bio-section' aria-expanded='true'><p class='member-detail-h2'>"+result['name'];
//       if (result['position'] != "") {
//         content += " | "+result['position'];
//       }
//       if ((result['linkedin'] != "") || (result['email'] != "")) {
//         if (result['email'] != "") {
//           content += "<a href='mailto:"+result['email']+"'><img src='images/email-icon.png' height='28' class='pull-right member-icon'></a>";
//         }
//         if (result['linkedin'] != "") {
//           content += "<a href='"+result['linkedin']+"'><img src='images/linkedin-icon.png' height='28' class='pull-right member-icon'></a>";
//         }
//         content += "</span>";
//       }
//       content += "</p><p class='member-detail-h4'>Team: "+result['team'];
//       if (result['major'] != "") {
//         content += "<br>Major: "+result['major'];
//       }
//       content += "</p>";
//       if (result['description'] != "") {
//         content += "<p class='member-detail-p'>"+result['description']+"</p></div></div>";
//       }
//       $('#bioholder_'+after).append(content);
//     }
//   });
var currentOpenBio = {
	after: -1,
	ref: -1,
	div: null
};

function collapseCurrent(){
	var temp = $('#active-bio');
	temp.removeAttr('id');
	temp.collapse('hide');
}

$(window).resize(function(){
	collapseCurrent();
});

function collapseAllBut(ref){
	var perrow = getperrow();
	var team = $("#team").get(0);
	var after = Math.min((Math.floor(ref/perrow)+1)*perrow-1, data_highest_bio_num);
	var div;
	if (ref === currentOpenBio.ref){
		collapseCurrent();
		currentOpenBio = {
			after: -1,
			ref: -1,
			div: null
		};
		return;
	}
	if (currentOpenBio.after === after){
    // console.log("getting html string for bio");
		$('#active-bio').html(getHTMLStringForBio(ref));
    // console.log(getHTMLStringForBio(ref));
	} else {
		if (currentOpenBio.div !== null){
			collapseCurrent();
		}
		div = document.createElement('div');
		div.innerHTML = getWrappedBio(ref);
		var bioToInsertAfter = $('#bioholder_' + after).get(0);
		bioToInsertAfter.parentNode.insertBefore(div, bioToInsertAfter.nextSibling);
		$('#active-bio').collapse('show');
		$('#active-bio').on('hiden', function() {
			$(this).remove();
		});
	}
	// console.log('#bioholder_' + after);
	// console.log(bioToInsertAfter);
	currentOpenBio = {
		after: after,
		ref: ref,
		div: div
	};
}
