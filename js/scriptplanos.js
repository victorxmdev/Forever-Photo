function toggleSidebar(){
	document.getElementById("sidebar").classList.toggle('active');
}

$(document).ready(function () {

	var _containerBtn = $(".jbtn-voltar");
	var _btnlink = $(".jbtn-voltar-link");

	$(window).scroll(function () {

		if($(this).scrollTop()> 50){

			_containerBtn.fadeIn(800);

		}else{

			_containerBtn.fadeOut(800);

		}

	});

	_containerBtn.click(function () {

		$("html, body").animate({scrollTop: 0}, 800);

		return false;
	});
});