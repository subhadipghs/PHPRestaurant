
// function create(fn) {
// 	var o = Object.create(fn.prototype);
// 	fn.call(o);
// 	return o;
// }


var FormUI = function(form) {
	this.form = document.forms[form];
}
FormUI.prototype.findFormInput = function(args) {
	return !this.form.arg ? '' : this.form.arg;
}

var o = new FormUI('register');

console.log(o.findFormInput('name'));


