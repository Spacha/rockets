<template>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<svg xmlns="http://www.w3.org/2000/svg" :width="width" height="200" ref="canvas">
					<!-- <rect :width="width" height="200" fill="#eee"/> -->
					<rect x="10" :y="sliderYMax" width="40" :height="sliderYMin-sliderYMax" fill="#eee" />

					<rect x="10" :y="sliderY" width="40" :height="sliderHeight" fill="orange" />

					<g @mousedown="md($event, 1)" @touchstart="md($event, 1)">
						<circle cx="30" :cy="sliderY" r="6" fill="red" />
					</g>

					<g>
						<text x="30" :y="sliderYMin+20" dominant-baseline="middle" text-anchor="middle" class="noselect" style="font-weight: bold;">
							{{ (sliderVal*100).toFixed() }} %
						</text>
					</g>
				</svg>
				<!-- <div>{{ (sliderVal*100).toFixed() }} %</div> -->
				<div><span style="font-size: 1.2rem;">{{ totalImpulse.toFixed() }} s</span></div>

				<b-button @click.prevent="addData">Add data</b-button>
			</div>
			<div class="col col-10">
				<reactive-chart :chart="chart" :size="{height: '300px', width: '600px'}"/>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data: () => ({
		isMove: false,
		sliderYMax: 10,
		sliderYMin: 160,
		sliderY: 160,
		width: 60,

		chart: {
			uuid: 'chart-isp',
			data: [{
				type: 'scatter',
				line: {shape: 'spline', smoothing: 0.6},
				mode: 'lines',
				fill: 'tozeroy',
				x: [0],
				y: [0],
			}],
			layout: {
				font: {size: 11},
				margin: {l: 35, r: 15, b: 30, t: 5},
				xaxis: {
					title: {text: 'time <b>t</b>', font: {size: 11}},
					range: [0, 0],
					autorange: true
				},
				yaxis: {
					title: {text: 'thrust <b>F</b>', font: {size: 11}},
					range: [0, 1000]
				},
			},
			config: {
				staticPlot: true,
				responsive: true,
				displaylogo: false
			}
		},
	}),

	computed: {
		sliderHeight: function() {
			return this.sliderY < this.sliderYMin ? this.sliderYMin - this.sliderY : 0
		},

		rectX: function() {
			return this.x < this.xPart2 ? this.x : this.xPart2
		},

		sliderVal: function() {
			return 1 - ((this.sliderY-this.sliderYMax) / (this.sliderYMin-this.sliderYMax))
		},

		totalImpulse: function() {
			var it = 0;
			var trace = this.chart.data[0];

			// if only one data entry, total impulse is always 0
			if (trace.x.length > 1) {

				for(var i = 1; i < trace.x.length; i++) {
					// area of a square + triangle on top
					// (x * y) + 1/2 * delta-X * delta-Y
					let dX = Math.abs(trace.x[i-1]-trace.x[i]);
					let dY = Math.abs(trace.y[i-1]-trace.y[i]);

					it += Math.min(trace.y[i-1], trace.y[i])*dX + 0.5 * dX * dY;
				}

			}

			return it;
		}
	},

	methods: {
		addData: function(time) {
			this.chart.layout.datarevision = new Date()

			var data = this.chart.data[0];
			data.x.push(data.x[data.x.length-1] + 1)
			// data.y.push(Math.floor(Math.random() * (100 - 0) ) + 0)
			data.y.push(1000 * this.sliderVal)

			// this is a hack to make the graph follow along
			// this.chart.layout.xaxis.range = [
			// 	moment(time * 1000).subtract(10, 'seconds').toDate(),
			// 	moment(time * 1000).add(0.25, 'seconds').toDate()
			// ]
		},

		mPos(canvas, evt) {
		    var rect = canvas.getBoundingClientRect();

		    return {
				x: evt.clientX - rect.left,
				y: evt.clientY - rect.top
		    };
		},

		// Mouse Down
		md(ev, val) {
			if (val === 1) {
				this.isMove = true;        
			}

			document.addEventListener("mousemove", this.mm);
			document.addEventListener("mouseup", this.mu);
			document.addEventListener("touchmove", this.tm);
			document.addEventListener("touchend", this.mu);
		},

		// Mouse Up
		mu() {
			this.isMove = false;

			document.removeEventListener("mousemove", this.mm)
			document.removeEventListener("mouseup", this.mu)
			document.removeEventListener("touchmove", this.tm)
			document.removeEventListener("touchend", this.mu)
		},

		// Mouse Move
		mm(ev) {
			var mPos = this.mPos(this.$refs['canvas'], ev)

			if (this.isMove) {
				this.sliderY = mPos.y;
				
				if (this.sliderY > this.sliderYMin) {
					this.sliderY = this.sliderYMin;
				}

				if (this.sliderY < this.sliderYMax) {
					this.sliderY = this.sliderYMax;
				}
			}
		},

		// Touch Move
		tm(ev) {
			var tPos = this.mPos(this.$refs['canvas'], ev.touches[0])

			if (this.isMove) {
				this.sliderY = tPos.y;
			}
		}
	},

	created() {
		//
  	}
};
</script>
