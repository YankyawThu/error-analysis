<template>
    <Main>
        <div class="flex flex-col">
            <div class="mx-5 mt-3 mb-1 border-l-4 border-green-500"><span class="mr-1 uppercase pl-2 font-semibold">{{$page.props.all[0][0]}}</span>details</div>
            <div class="self-center pb-3">
                <apexchart width="450" type="line" :options="{xaxis: {categories: [$page.props.date.date[4], $page.props.date.date[3], $page.props.date.date[2], $page.props.date.date[1], $page.props.date.date[0]]}}" :series="[{name: $page.props.all[0][0]+' error',data: [$page.props.all[0][1][4], $page.props.all[0][1][3],$page.props.all[0][1][2],$page.props.all[0][1][1],$page.props.all[0][1][0]]}]"></apexchart>
            </div>
            <div class="container bg-white mb-4">
                <table class="w-full border">
                    <thead>
                        <tr>
                            <th :class="th">Date</th>
                            <th :class="th">Counts</th>
                            <th :class="th">Messages</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(data,index) in $page.props.all[1]" :key="index" class="hover:bg-blue-200">
                            <td :class="td">{{data.date}}</td>
                            <td :class="td">{{data.count}}</td>
                            <td :class="td">{{data.messages}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Main>
</template>

<script>
import Main from './Main'
export default {
    components: {Main},
    name: 'DetailError',
    data() {
        return {
            th: 'text-center border py-2 bg-gray-200',
            td: 'text-center border py-2',
        }
    },
}
</script>