<template>

	<div :style="size" :ref="chart.uuid"></div>

</template>

<script>

export default {
	props: ['chart', 'size'],
	data: () => ({
		//
	}),
	mounted() {
		Plotly.newPlot(
			this.$refs[this.chart.uuid],
			this.chart.data,
			this.chart.layout,
			this.chart.config
		);
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
	}
}

</script>