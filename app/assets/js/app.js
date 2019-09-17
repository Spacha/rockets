import katex from 'katex';

/*
	KaTeX tips:
	\displaystyle 	Makes integral bigger and nicer! And other operators too: \displaystyle\int
*/

function renderEq(eq, elementId) {
	var element = document.querySelector('#' + elementId)

	if (!element) return;

	katex.render(eq, element, {
	    throwOnError: false
	});
}

var formulae = {
	"eq2_1": String.raw`I_t = \displaystyle\int_{0}^{t} Fdt`,
	"eq2_2": String.raw`I_t = Ft`,
}

// TODO: loop automatically or something!
var eqPrefix = 'ktx-eq--';

renderEq(formulae.eq2_1, eqPrefix + 'eq2_1');
renderEq(formulae.eq2_2, eqPrefix + 'eq2_2');
