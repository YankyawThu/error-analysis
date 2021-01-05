<template>
    <Main>
        <div class="flex flex-wrap bg-gray-100 justify-around">
            <div class="p-3">
                <div class="mb-3 text-center underline" style="text-decoration:underline dashed;text-underline-offset:0.3em;">Last 5 days of Errors</div>
                <apexchart width="450" type="bar" :options="{xaxis: {categories: [$page.props.date.date[4], $page.props.date.date[3], $page.props.date.date[2], $page.props.date.date[1], $page.props.date.date[0]]}}" :series="[{name: 'errors',data: [$page.props.date.count[4], $page.props.date.count[3], $page.props.date.count[2], $page.props.date.count[1], $page.props.date.count[0]]}]"></apexchart>
            </div>
            <div class="p-3">
                <div class="mb-3 text-center underline" style="text-decoration:underline dashed;text-underline-offset:0.3em;">Total numbers of Errors</div>
                <PieChart/>
            </div>
        </div>
        <span class="mr-5 block text-center border-b-2 border-gray-400 w-full" style="line-height:0.1em;"><span class="border-2 bg-gray-100 rounded-pill border-green-500 px-3 py-1 font-semibold">Overview Analysis</span></span>
        <div class="py-5 bg-white">
            <OverallData/>
        </div>
    </Main>
</template>

<script>
import Main from './Main'
import PieChart from './PieChart'
import OverallData from './OverallData'
export default {
    components: {PieChart,OverallData,Main},
    name: 'Overview',
    data() {
        return {
            // options: {
            //     xaxis: {
            //     categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
            //     }
            // },
            // series: [{
            //     name: 'errors',
            //     data: [10, 30, 50, 70, 100]
            // }],
        }
    }
}
</script>