const serviceId = getUrlParam('service_id','0')

document.addEventListener("DOMContentLoaded", function(){
	getService()
})

function getService() {
	const xhr = new XMLHttpRequest()
	const url = 'php/own/json_gallery.php'
	const params = `service_id=${serviceId}`
	console.log(url)
	console.log(params)
	xhr.open('GET', `${url}?${params}`, true)
	xhr.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			let data = JSON.parse(this.responseText)
			renderCarousel(data)
		}
	}

	xhr.send()
}

function renderCarousel(data) {
	const carouselIndicators = document.getElementsByClassName('carousel-indicators')
	const carouselInner = document.getElementsByClassName('carousel-inner')
	
	const dataEntries = data.entries()
	for (const [index, value] of dataEntries) {
		renderTemplate(index, value['img'])
	}

	function renderTemplate(index, img) {
		let active = (index == 0) ? 'active' : ''
		
		let indicators = `
			<li data-target="#carouselExampleIndicators" data-slide-to="${index}" class="${active}">
				<img class="img-thumb" src="img/product/single-product/${img}" alt=""> 
			</li>
		`

		let inner = `
		<div class="carousel-item ${active}">
			<img class="d-block w-100 img-carousel" src="img/product/single-product/${img}">
		</div>
		`

		carouselIndicators[0].innerHTML += indicators
		carouselInner[0].innerHTML += inner
	}

				console.log(carouselInner[0])
}