<template>
    <div class="flex flex-col w-full">
        <div class="flex justify-between py-3 px-4 bg-gray-800">
            <div class="nav-list flex flex-row self-center">
                <div>
                    <i class="fas fa-exclamation-triangle text-yellow-500 text-lg mr-2"></i>
                </div>
                <div>
                    <inertia-link href="/" :class="navLink" class="bg-gray-700 text-gray-300">Overview</inertia-link>
                </div>
                <div>
                    <inertia-link href="/office" :class="navLink">Office Errors</inertia-link>
                </div>
                <div>
                    <inertia-link href="/pos" :class="navLink">POS Errors</inertia-link>
                </div>
                <div>
                    <inertia-link href="/window" :class="navLink">Window Errors</inertia-link>
                </div>
                <div>
                    <inertia-link href="/system" :class="navLink">System Errors</inertia-link>
                </div>
                <div>
                    <inertia-link href="/other" :class="navLink">Other Errors</inertia-link>
                </div>
            </div>
            <div class="nav-action">
                <button @click="toggle" class="text-white bg-gradient-to-r from-green-400 to-blue-400 rounded py-2 px-3 font-semibold focus:outline-none"><i class="fas fa-plus mr-2"></i>New Data</button>
            </div>
        </div>
        <div v-if="active">
            <AddData/>
        </div>
    </div>
</template>

<script>
import AddData from '../AddData'
export default {
    components: {AddData},
    name: 'Nav',
    data() {
        return {
            navLink: 'px-2 hover:no-underline py-4 text-gray-300 hover:text-gray-300 hover:bg-gray-600 hidden md:inline',
            active: false,
        }
    },
    methods: {
        toggle() {
            this.active = !this.active
        }
    },
}
</script>