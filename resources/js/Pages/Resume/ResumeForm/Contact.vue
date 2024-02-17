<script setup>
    import { reactive } from 'vue';
    const props = defineProps(['formData']);

    const otherContactForm = reactive({
        isFormVisible: false
    });

    const showOtherContactForm = () => {
        otherContactForm.isFormVisible = !otherContactForm.isFormVisible;
    };

    const clearFormData = () => {
        Object.keys(props.formData).forEach(key => {
            props.formData[key] = '';
        });
    };
</script>
<template>
     <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 border-b border-gray-200 bg-blue-gray-100 flex justify-between">
                            <span class="font-bold text-lg">連絡先</span>
                            <button class="text-sm hover:underline" @click="clearFormData"><i class="fa-solid fa-xmark mr-1"></i>リセットする</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                電話番号
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <input type="tel" id="phone_number1" name="phone_number1" v-model="props.formData.phone_number1" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <span class="text-gray-700 text-center pt-2 px-1">-</span>
                            <input type="tel" id="phone_number2" name="phone_number2" v-model="props.formData.phone_number2" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <span class="text-gray-700 text-center pt-2 px-1">-</span>
                            <input type="tel" id="phone_number3" name="phone_number3" v-model="props.formData.phone_number3" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                Email
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="Email" id="email" name="email" v-model="props.formData.email" autocomplete="off" class="w-96 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-2 ">
            <button @click="showOtherContactForm">
                <span>上記以外の連絡先を希望する場合</span>
                <i v-if="otherContactForm.isFormVisible" class="fa-solid fa-chevron-down pl-2 text-xs"></i>
                <i v-else class="fa-solid fa-chevron-right pl-2 text-xs"></i>
            </button>
        </div>
        <div v-if="otherContactForm.isFormVisible" class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max">
                <tbody>
                    <tr>
                        <th class="p-4 border-b border-gray-300 bg-gray-100 rounded-tl-xl w-52">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                電話番号
                            </p>
                        </th>
                        <td class="p-4 border-b border-gray-300 flex">
                            <input type="tel" id="other_phone_number1" name="other_phone_number1" v-model="props.formData.other_phone_number1" pattern="^0[0-9]{10,11}$" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <span class="text-gray-700 text-center pt-2 px-1">-</span>
                            <input type="tel" id="other_phone_number2" name="other_phone_number2" v-model="props.formData.other_phone_number2" pattern="^0[0-9]{10,11}$" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <span class="text-gray-700 text-center pt-2 px-1">-</span>
                            <input type="tel" id="other_phone_number3" name="other_phone_number3" v-model="props.formData.other_phone_number3" pattern="^0[0-9]{10,11}$" autocomplete="off" class="w-20 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 bg-gray-100">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                Email
                            </p>
                        </th>
                        <td class="p-4">
                            <input type="Email" id="other_email" name="other_email" v-model="props.formData.other_email" autocomplete="off" class="w-96 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>