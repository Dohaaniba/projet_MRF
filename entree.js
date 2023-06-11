let star = document.querySelectorAll('input');
let showValue1 = document.querySelector('#rating-value1');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue1.innerHTML = i;
	});
}



let showValue2 = document.querySelector('#rating-value2');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue2.innerHTML = i;
	});
}


let showValue3 = document.querySelector('#rating-value3');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue3.innerHTML = i;
	});
}


let showValue4 = document.querySelector('#rating-value4');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue4.innerHTML = i;
	});
}

let showValue5 = document.querySelector('#rating-value5');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue5.innerHTML = i;
	});
}