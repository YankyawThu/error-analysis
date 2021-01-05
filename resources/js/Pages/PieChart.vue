<template>
    <div>
        <apexchart width="450" type="pie" :options="chartOptions" :series="[$page.props.array.office, $page.props.array.window, $page.props.array.pos, $page.props.array.system, $page.props.array.other]"></apexchart>
    </div>
</template>

<script >
export default {
    name: 'PieChart',
    data() {
        return {
            // series: [1, 1, 1, 1, 1],
            chartOptions: {
            labels: ['Office', 'Window', 'POS', 'System','Other']
            }
        }
    },
}
</script>