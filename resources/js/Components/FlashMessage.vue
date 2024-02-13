<script setup>
    import { ref, onMounted } from 'vue';

    const showMessage = ref(true);

    onMounted(() => {
        setTimeout(() => {
            showMessage.value = false;
        }, 3000);
    });
</script>

<template>
    <div v-if="showMessage && $page.props.flash.status === 'success'" class="bg-blue-500 text-white p-4 mx-12 mb-6">
        {{ $page.props.flash.message }}
    </div>
    <div v-if="showMessage && $page.props.flash.status === 'danger'" class="bg-red-500 text-white p-4 mx-12 mb-6">
        {{ $page.props.flash.message }}
    </div>
</template>