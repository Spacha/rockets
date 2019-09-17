import katex from 'katex';

/*
	KaTeX tips:
	\displaystyle 	Makes integral bigger and nicer! And other operators too: \displaystyle\int
*/

function renderEq(eq, elementId, useId = true) {
	var element = document.querySelector((useId ? '#' : '') + elementId)

	if (!element) return;

	katex.render(eq, element, {
	    throwOnError: false
	});
}

var formulae = {
	"eq2_1": String.raw`I_t = \displaystyle\int_{0}^{t} Fdt`,
	"eq2_2": String.raw`I_t = Ft`,

	"eq2_3": String.raw`I_s = I_{sp} = \frac{\int_{0}^{t} Fdt}{\int_{0}^{t} \dot{m}dt}`,
}

// TODO: loop automatically or something!
var eqPrefix = 'ktx-eq--';

renderEq(formulae.eq2_1, eqPrefix + 'eq2_1');
renderEq(formulae.eq2_2, eqPrefix + 'eq2_2');
renderEq(formulae.eq2_3, eqPrefix + 'eq2_3');


var Isp_integral = {
    type: 'scatter',
    line: {shape: 'spline', smoothing: 0.6},
    mode: 'lines',
    fill: 'toself',
    x: [0, 2.5, 5, 7.5, 10, 12.5, 15, 17.5, 20],
    y: [0, 1.5, 1.5, 1.5, 1.5, 0.7, 0.7, 0.3, 0],
};

var data = [ Isp_integral ];

var layout = {
	font: {size: 11},
	margin: {l: 35, r: 15, b: 30, t: 5},
	height: 220,
	xaxis: {
		title: {text: 'time <b>t</b>', font: {size: 11}}
	},
	yaxis: {
		title: {text: 'thrust <b>F</b>', font: {size: 11}}
	},
	annotations: [{
		showarrow: false,
		text: "I<sub>t</sub>",
		font: {
			family: 'KaTeX_Math',
			size: 20,
		},
		xref: 'paper',
		yref: 'paper',
		x: 0.35,
		y: 0.5
    }],
};

var config = {
	staticPlot: true,
	responsive: true,
	displaylogo: false
}

Plotly.newPlot('myDiv', data, layout, config);