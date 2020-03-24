class Scroll {
	constructor(firstElement){

		this.firstElement = firstElement;

		this.butonSlider();
	}



	scrollTo (target) {
    $("html, body").stop().animate({ scrollTop: target.offset().top }, "slow");
  	}

	butonSlider() {
		this.firstElement.addEventListener("click", ()=>{
			this.scrollTo($("#pageTwo"));
		})
	}

}

const myScroll = new Scroll ((document.getElementById("buttonslider")),)	
