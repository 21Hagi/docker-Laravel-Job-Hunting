<script setup>
    const props = defineProps(['formData']);
</script>
<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">志望動機</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 bg-gray-100 rounded-tl-xl w-52 max-md:w-24">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                志望動機
                            </p>
                        </th>
                        <td class="p-4">
                            <textarea type="text" id="reason" name="reason" v-model="props.formData.reason" class="w-[575px] h-60 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out resize-none max-xl:w-full"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>