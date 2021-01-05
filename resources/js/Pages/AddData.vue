<template>
        <div>
            <div class="dropdown shadow-lg position-absolute border z-20 bg-white inset-x-7 mt-4 rounded pt-3 pb-4 px-4 lg:inset-x-80">
                <div v-if="$page.props.success" class="py-2 mb-2 pl-3 bg-yellow-500 rounded">{{$page.props.success}}</div>
                <form @submit.prevent="submit">
                    <div class="flex flex-col">
                        <label for="" :class="labelStyle">Error type</label>
                        <select v-model="type" :class="inputStyle">
                            <option value="office">Office Errors</option>
                            <option value="pos">POS Errors</option>
                            <option value="window">Window Errors</option>
                            <option value="system">System Errors</option>
                            <option value="other">Other Errors</option>
                        </select>
                        <div v-if="$page.props.error.type" :class="errorStyle">{{$page.props.error.type[0]}}</div>

                        <label for="" :class="labelStyle">Date</label>
                        <input type="date" v-model="date" :class="inputStyle">
                        <div v-if="$page.props.error.date" :class="errorStyle">{{$page.props.error.date[0]}}</div>

                        <label for="" :class="labelStyle">Error count</label>
                        <input type="text" v-model="count" :class="inputStyle">
                        <div v-if="$page.props.error.count" :class="errorStyle">{{$page.props.error.count[0]}}</div>

                        <label for="" :class="labelStyle">Error Messages</label>
                        <input type="text" v-model="message" :class="inputStyle">
                        <div v-if="$page.props.error.messages" :class="errorStyle">{{$page.props.error.messages[0]}}</div>

                        <button class="bg-gradient-to-r from-green-300 to-blue-300 py-2 px-2 mt-4 rounded shadow-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
</template>

<script>
export default {
    name: 'AddData',
    data() {
        return {
            inputStyle: 'border-2 border-gray-300 py-1 mb-2 px-2 w-full h-10',
            labelStyle: '',
            errorStyle: 'text-xs text-red-500 mb-3',
            type: '',
            date: '',
            count: 1,
            message: '',
        }
    },
    methods: {
        submit() {
            let data = new FormData()
            data.append('type' , this.type)
            data.append('date' , this.date)
            data.append('count' , this.count)
            data.append('messages' , this.message)
            this.$inertia.post('/add-data' , data)
        },
    },
}
</script>