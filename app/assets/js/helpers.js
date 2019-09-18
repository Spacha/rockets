import katex from 'katex'

export const renderEq = (eq, element, useId = true) => {
	// var element = document.querySelector((useId ? '#' : '') + elementId)

	if (!element) return

	// manipulate equation
	eq = eq.replace(/  +/g, ' ') // removes line breaks and multiple whitespaces

	katex.render(eq, element, {
	    throwOnError: false
	});
}