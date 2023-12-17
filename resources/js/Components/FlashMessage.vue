<script setup>
</script>

<template>
    <div v-if="$page.props.flash.status === 'success'" class="bg-blue-500 text-white p-4 mx-12 mb-6">
        {{ $page.props.flash.message }}
    </div>
    <div v-if="$page.props.flash.status === 'danger'" class="bg-red-500 text-white p-4 mx-12 mb-6">
        {{ $page.props.flash.message }}
    </div>
</template>