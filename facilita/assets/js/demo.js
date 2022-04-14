"use strict";


function success(message){
//Notify
$.notify({
	icon: 'fas fa-check',
	title: 'Sucesso',
	message: message,
},{
	type: 'success',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}

function operador(message){
$.notify({
	icon: 'fas fa-user-cog',
	title: 'Sucesso',
	message: message,
},{
	type: 'success',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}
function moneyadd(message){
//Notify
$.notify({
	icon: 'fas fa-dollar-sign',
	title: 'Saldo adicionado',
	message: message,
},{
	type: 'success',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}


function debito(message){
//Notify
$.notify({
	icon: 'fas fa-dollar-sign',
	title: 'Sucesso',
	message: message,
},{
	type: 'success',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}

function fail(message){
//Notify
$.notify({
	icon: 'fas fa-dollar-sign',
	title: 'Erro',
	message: message,
},{
	type: 'danger',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}


function msgextorno(message){
//Notify
$.notify({
	icon: 'fas fa-dollar-sign',
	title: 'Extorno Realizado',
	message: message,
},{
	type: 'primary',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}


function update(message){
//Notify
$.notify({
	icon: 'fas fa-check',
	title: 'Update',
	message: message,
},{
	type: 'primary',
	placement: {
		from: "bottom",
		align: "right"
	},
	time: 1000,
});

}