<template>

	<div :ref="chart.uuid"></div>

</template>

<script>

export default {
	props: ['chart', 'size'],
	data: () => ({
		//
	}),

	mounted() {
		this.$nextTick(function() {
			window.addEventListener('resize', this.resize);

			//Init
			// Couldn't get the real widht without this delay...
			setTimeout(this.resize, 1);
		})

		Plotly.newPlot(
			this.$refs[this.chart.uuid],
			this.chart.data,
			this.chart.layout,
			this.chart.config
		);
	},

	methods: {
		resize() {
			var parent = this.$refs[this.chart.uuid].parentElement;

			if (parent && parent.clientWidth) {
				Plotly.relayout(this.$refs[this.chart.uuid], {
					width: parent.clientWidth,
					height: parent.clientHeight
				})
			}
		}
	},

	watch: {
		chart: {
			handler() {
				Plotly.react(
					this.$refs[this.chart.uuid],
					this.chart.data,
					this.chart.layout,
					this.chart.config
				)
			},
			deep: true
		}
	},

	beforeDestroy() {
		window.removeEventListener('resize', this.resize);
	}
}

</script>