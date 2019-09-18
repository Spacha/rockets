<template>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<svg xmlns="http://www.w3.org/2000/svg" :width="width" height="200" ref="canvas">
					<!-- <rect :width="width" height="200" fill="#eee"/> -->
					<rect x="10" :y="sliderYMax" width="40" :height="sliderYMin-sliderYMax" fill="#eee" />

					<rect x="10" :y="sliderY" width="40" :height="sliderHeight" style="fill: #1f77b4; opacity: 0.5;" />

					<g>
						<text x="30" :y="sliderYMin+20" dominant-baseline="middle" text-anchor="middle" class="noselect" style="font-weight: bold;">
							{{ (sliderVal*100).toFixed() }} %
						</text>
						<text x="30" :y="(sliderYMin-sliderYMax)/2+sliderYMax" dominant-baseline="middle" text-anchor="middle" class="noselect" style="writing-mode: tb; font-weight: bold; fill: #fff; pointer-events: none;">
							THRUST
						</text>
					</g>

					<g @mousedown="md($event, 1)" @touchstart="md($event, 1)">
						<!-- <circle cx="30" :cy="sliderY" r="6" fill="red" /> -->
						<rect x="9" :y="sliderY-9" width="42" height="18" rx="4" ry="4" fill="#4871a7" />
					</g>
				</svg>

				<div class="input-group mb-3 d-flex justify-content-center">
					<div class="input-group-prepend">
						<b-button @click.prevent="toggleTime" :variant="isPlaying ? 'danger' : 'success'">
							<i class="fa" :class="{'fa-pause': isPlaying, 'fa-play': !isPlaying}"></i>
						</b-button>
					</div>

					<div class="input-group-div">{{ time }} s</div>

					<div class="input-group-append" >
						<b-button @click.prevent="reset" :variant="'dark'" :class="{'disabled': time == 0}">
							<i class="fa fa-step-backward"></i>
						</b-button>
					</div>
				</div>

			</div>
			<div class="col col-lg-9 px-0" style="height: 254px">
				<reactive-chart :chart="chart" />
			</div>
		</div>
		<div class="row">
			<div class="mt-3 experiment-results">
				<h4>Total impulse:</h4>
				<p>We can see how total impulse grows with time as well as with thrust. If thrust is set to zero, no matter how long time passes, total impulse is exactly zero.</p>

				<p id="experiment--total-impulse-1"></p>
			</div>
		</div>
	</div>
</template>

<script>
export default {

	// TODO: slider more robust!
	// <slider min="0" max="100" step="0.1" height="100" x="10" y="10" />
	data: () => ({
		isMove: false,
		sliderYMax: 10,
		sliderYMin: 160,
		sliderY: 130,
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
				margin: {l: 40, r: 15, b: 30, t: 5},
				xaxis: {
					title: {text: 'time <b>t</b> (s)', font: {size: 11}},
					range: [0, 1],
				},
				yaxis: {
					title: {text: 'thrust <b>F</b> (N)', font: {size: 11}},
					range: [0, 1050]
				},
				width: 0.9 * window.innerWidth,
  				height: 0.9 * window.innerHeight
			},
			config: {
				staticPlot: true,
				responsive: true,
				displaylogo: false
			}
		},

		isPlaying: false,
		timer: null,
		time: 0
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
			var it = 0
			var trace = this.chart.data[0]

			// if only one data entry, total impulse is always 0
			if (trace.x.length > 1) {

				for(var i = 1; i < trace.x.length; i++) {
					// area of a square + triangle on top
					// (x * y) + 1/2 * delta-X * delta-Y
					let dX = Math.abs(trace.x[i-1]-trace.x[i])
					let dY = Math.abs(trace.y[i-1]-trace.y[i])

					it += Math.min(trace.y[i-1], trace.y[i])*dX + 0.5 * dX * dY
				}

			}

			return it
		}
	},

	methods: {

		renderEquation: function() {
			let it = this.totalImpulse.toFixed()
			let eq = it == 0 ? '=' : '\\approx'

			renderEq(String.raw`I_t = \displaystyle\int_{0}^{${this.time}} Fdt ${eq} ${it} s`, 'experiment--total-impulse-1')
		},
		
		toggleTime: function() {
			this.isPlaying = !this.isPlaying

			if (this.isPlaying) {
				this.timer = setInterval( () => {
					this.time++

					this.addData(this.time, 1000 * this.sliderVal)

				}, 1000 )
			} else {
				clearInterval(this.timer)
			}
		},

		reset: function() {
			var data = this.chart.data[0]
			data.x = []
			data.y = []

			this.time = 0

			// reset graph to zero (and set axis)
			this.addData(0, 0)
			this.chart.layout.xaxis.autorange = false
			this.chart.layout.xaxis.range = [0, 1]
		},

		addData: function(time, value) {
			this.chart.layout.datarevision = new Date()

			var data = this.chart.data[0]
			data.x.push(time)
			data.y.push(value)

			// set autorange to true
			if (!this.chart.layout.xaxis.autorange) {
				this.chart.layout.xaxis.autorange = true
			}
		},

		mPos(canvas, evt) {
		    var rect = canvas.getBoundingClientRect()

		    return {
				x: evt.clientX - rect.left,
				y: evt.clientY - rect.top
		    }
		},

		// Mouse Down
		md(ev, val) {
			if (val === 1) {
				this.isMove = true        
			}

			document.addEventListener("mousemove", this.mm)
			document.addEventListener("mouseup", this.mu)
			document.addEventListener("touchmove", this.tm)
			document.addEventListener("touchend", this.mu)

		},

		// Mouse Up
		mu() {
			this.isMove = false

			document.removeEventListener("mousemove", this.mm)
			document.removeEventListener("mouseup", this.mu)
			document.removeEventListener("touchmove", this.tm)
			document.removeEventListener("touchend", this.mu)
		},

		// Mouse Move
		mm(ev) {
			var mPos = this.mPos(this.$refs['canvas'], ev)

			this.handleCursorMove(mPos)
		},

		// Touch Move
		tm(ev) {
			var tPos = this.mPos(this.$refs['canvas'], ev.touches[0])

			this.handleCursorMove(tPos)
		},

		handleCursorMove(cPos) {
			if (this.isMove) {
				this.sliderY = cPos.y
				
				if (this.sliderY > this.sliderYMin) {
					this.sliderY = this.sliderYMin
				}

				if (this.sliderY < this.sliderYMax) {
					this.sliderY = this.sliderYMax
				}
			}
		},

		preventScroll(e) {
			e.preventDefault();
		}
	},

	created() {
		//
  	},

  	mounted() {
  		this.renderEquation()
		this.$refs['canvas'].addEventListener('touchmove', this.preventScroll, {passive: false})
  	},

  	watch: {
  		totalImpulse: function() {
			this.renderEquation()
		}
  	},

  	beforeDestroy() {
		window.removeEventListener('touchmove', this.preventScroll)
  	}
}
</script>
