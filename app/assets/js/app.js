import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'

import { getEquations } from './vars/equations'
import { renderEq } from './helpers'

Vue.use(BootstrapVue)


// RENDER EQUATIONS
// TODO: loop automatically or something!

var eqs = getEquations()
var eqPrefix = 'ktx-eq--';

renderEq(eqs.eq2_1, eqPrefix + 'eq2_1');
renderEq(eqs.eq2_2, eqPrefix + 'eq2_2');
renderEq(eqs.eq2_3_4, eqPrefix + 'eq2_3_4');
// renderEq(eqs.eq2_4, eqPrefix + 'eq2_4');
renderEq(eqs.eq2_5, eqPrefix + 'eq2_5');
renderEq(eqs.eq2_6, eqPrefix + 'eq2_6');
renderEq(eqs.eq2_7, eqPrefix + 'eq2_7');
renderEq(eqs.eq2_8_9_10, eqPrefix + 'eq2_8_9_10');
// renderEq(eqs.eq2_9, eqPrefix + 'eq2_9');
// renderEq(eqs.eq2_10, eqPrefix + 'eq2_10');
renderEq(eqs.eq2_11_12, eqPrefix + 'eq2_11_12');
renderEq(eqs.eq2_13, eqPrefix + 'eq2_13');
renderEq(eqs.eq2_14, eqPrefix + 'eq2_14');
renderEq(eqs.eq2_15, eqPrefix + 'eq2_15');
renderEq(eqs.eq2_16, eqPrefix + 'eq2_16');
renderEq(eqs.eq2_17, eqPrefix + 'eq2_17');
renderEq(eqs.eq2_18, eqPrefix + 'eq2_18');
renderEq(eqs.eq2_19, eqPrefix + 'eq2_19');
renderEq(eqs.eq2_20, eqPrefix + 'eq2_20');


/*******************************************
 * 								VueJS
 ******************************************/

import ReactiveChart from './components/ReactiveChart.vue'
import SpecificImpulse from './components/experiment/SpecificImpulse.vue'

Vue.component('ReactiveChart', ReactiveChart)
Vue.component('SpecificImpulse', SpecificImpulse)

var app = new Vue({
	el: '#vue-experiment--specific-impulse'
})


/*******************************************
 * 								Graphs
 ******************************************/

var Isp_integral = {
  type: 'scatter',
  line: {shape: 'spline', smoothing: 0.6},
  mode: 'lines',
  fill: 'tozeroy',
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