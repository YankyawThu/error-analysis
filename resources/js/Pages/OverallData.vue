<template>
    <div class="container">
        <table class="w-full">
            <thead>
                <tr>
                    <th></th>
                    <th :class="th" v-for="(date,index) in $page.props.date.date" :key="index">
                        {{date}}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td :class="f_td"><button :class="td_btn" class="bg-blue-400">Office</button></td>
                    <td :class="td" v-for="(count,index) in $page.props.data[0]" :key="index">{{count}}</td>
                </tr>
                <tr>
                    <td :class="f_td"><button :class="td_btn" class="bg-yellow-400">POS</button></td>
                    <td :class="td" v-for="(count,index) in $page.props.data[1]" :key="index">{{count}}</td>
                </tr>
                <tr>
                    <td :class="f_td"><button :class="td_btn" class="bg-green-400"><i class="fab fa-windows mr-1"></i>Window</button></td>
                    <td :class="td" v-for="(count,index) in $page.props.data[2]" :key="index">{{count}}</td>
                </tr>
                <tr>
                    <td :class="f_td"><button :class="td_btn" class="bg-red-400">System</button></td>
                    <td :class="td" v-for="(count,index) in $page.props.data[3]" :key="index">{{count}}</td>
                </tr>
                <tr>
                    <td :class="f_td"><button :class="td_btn" class="bg-purple-400">Other</button></td>
                    <td :class="td" v-for="(count,index) in $page.props.data[4]" :key="index">{{count}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'OverallData',
    data() {
        return {
            th: 'text-center border py-2 bg-gray-200',
            td: 'text-center border',
            f_td: 'text-center bg-white',
            td_btn: 'transform skew-x-12 duration-200 hover:scale-150 border w-28 py-2 text-white',
            index: 1,
        }
    },
}
</script>