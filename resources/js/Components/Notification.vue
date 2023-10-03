<script setup>
    import {defineProps, ref, onMounted, watch} from 'vue';

    const props = defineProps({
        message: Object
    })

    const showNotification = ref(false)
    let timeout = ref(null)

    onMounted(() => {
        // showNotification.value = true;
        // setTimeout(() => {showNotification.value = false}, 200)
    })

    watch(() => props.message, (first, second) => {
        showNotification.value = true
        if (timeout.value) {
            clearTimeout(timeout.value)
        }
        timeout.value = setTimeout(() => {
            showNotification.value = false
        }, 2000)
    }, {immediate: true}, {deep: true});


</script>

<style>
    /*
  Enter and leave animations can use different
  durations and timing functions.
*/
    .slide-fade-enter-active {
        transition: all 0.3s ease-out;
    }

    .slide-fade-leave-active {
        transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        transform: translateX(20px);
        opacity: 0;
    }
</style>

<template>
    <Transition name="slide-fade">
        <div class="flex" v-if="message && showNotification">
            <div class="m-auto">
                <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg">
                    <div class="flex flex-row">
                        <div class="px-2">
                            <svg v-if="message.type == 'success'" width="24" height="24" viewBox="0 0 1792 1792"
                                 fill="#44C997"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1299 813l-422 422q-19 19-45 19t-45-19l-294-294q-19-19-19-45t19-45l102-102q19-19 45-19t45 19l147 147 275-275q19-19 45-19t45 19l102 102q19 19 19 45t-19 45zm141 83q0-148-73-273t-198-198-273-73-273 73-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273zm224 0q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"/>
                            </svg>

                            <svg v-else xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="24"
                                 height="24" viewBox="0 0 24 24" stroke="#ed1b24">
                                <circle cx="12" cy="12" r="10" fill="#00000000" stroke-width="3"/>
                                <g transform="translate(12, 12), rotate(45), translate(-12, -12)">
                                    <line x1="12" x2="12" y1="6" y2="18" stroke-width="3" stroke-linecap="round"/>
                                    <line x1="6" x2="18" y1="12" y2="12" stroke-width="3" stroke-linecap="round"/>
                                </g>
                            </svg>


                        </div>
                        <div class="ml-2 mr-6">
                            <span class="font-semibold">{{ message.text }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
