import Vue from 'vue'
import 'bootstrap'

import BootstrapVue from 'bootstrap-vue'

import { getEquations } from './vars/equations'
import { renderEq } from './helpers'

Vue.use(BootstrapVue)


// RENDER EQUATIONS
// TODO: make efficient!

var eqs = getEquations()
var eqPrefix = 'ktx-eq--'

// add some data (mutate!)
eqs.unitI_t = String.raw`
	\displaystyle \bigg[ \frac{I_t}{m_pg_0} \bigg]
	= \displaystyle \frac{[I_t]}{[m_pg_0]}
	= \displaystyle \frac{[I_t]}{[m_p][g_0]}
	= \displaystyle \frac{\operatorname{N} \cdot \operatorname{s}}{\operatorname{kg} \cdot \operatorname{m}/\operatorname{s^2}}
	= \displaystyle {\frac{\cancel{\operatorname{kg} \cdot \operatorname{m}/\operatorname{s}^2} \cdot \operatorname{s}}{\cancel{\operatorname{kg} \cdot \operatorname{m}/\operatorname{s}^2}}}
	= \operatorname{s}`

eqs.newton = String.raw`1\operatorname{N} = \operatorname{kg} \cdot \operatorname{m}/\operatorname{s}^2`

for(const eqKey of Object.keys(eqs)) {
	var elems = document.getElementsByClassName(eqPrefix + eqKey)
	
	for(var i = 0; i < elems.length; i++) {
		renderEq(eqs[eqKey], elems[i])
	}
}


/*******************************************
 * 					VueJS
 ******************************************/

import ReactiveChart from './components/ReactiveChart.vue'
import TotalImpulse from './components/experiment/TotalImpulse.vue'

Vue.component('ReactiveChart', ReactiveChart)
Vue.component('TotalImpulse', TotalImpulse)

// TODO: try to render only if on a page that has the component
var vueApps = [
	{
		'el': 'vue-experiment--specific-impulse'
	}
]

for (var i = 0; i < vueApps.length; i++) {
	var elem = document.querySelector('#' + vueApps[i].el)
	if (!elem) continue

	new Vue({
		el: '#' + vueApps[i].el
	})
}


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

var plots = [
	{
		'el': 'myDiv',
		'data': data,
		'layout': layout,
		'config': config
	}
]

for (var i = 0; i < plots.length; i++) {
	var elem = document.querySelector('#' + plots[i].el)
	if (!elem) continue

	Plotly.newPlot(plots[i].el, plots[i].data, plots[i].layout, plots[i].config)
}
