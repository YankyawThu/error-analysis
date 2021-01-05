<template>
    <div>
        <div class="flex flex-col overflow-x-hidden">
            <div class="nav">
                <Nav/>
            </div>
            <div class="content">
                <slot/>
            </div>
        </div>
        <div class="bg-gray-800 py-3">
            <h1 class="text-center text-white text-xs">Copyright<i class="far fa-copyright mx-1"></i>IT Error Analysis by Yan. All right reserved.</h1>
        </div>
    </div>
</template>

<script>
import Nav from './Layout/Nav'
import Overview from './Overview'
export default {
    name: 'Main',
    components: {Nav,Overview}
}
</script>