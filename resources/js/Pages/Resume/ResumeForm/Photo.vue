<script setup>
    const props = defineProps(['formData']);

    const handleFileChange = (event) => {
        const file = event.target.files[0];
        if (file && isValidImage(file)) {
            previewImage(file);
        }
    };

    const previewImage = (file) => {
        const reader = new FileReader();

        reader.onload = () => {
            props.formData.photo = reader.result;
        };

        reader.readAsDataURL(file);
    };

    const isValidImage = (file) => {
        const allowedExtensions = ['.jpg', '.jpeg', '.png'];
        const extension = file.name.toLowerCase().slice((file.name.lastIndexOf(".") - 1 >>> 0) + 2);

        return allowedExtensions.includes(`.${extension}`);
    };

    const removeImage = () => {
        props.formData.photo = null;
        const fileInput = document.getElementById('photo');
        if (fileInput) {
            fileInput.value = null;
        }
    };
</script>
<template>
    <section class="text-gray-600 body-font">
        <div class="mb-2">
            <table class="w-full text-left table-auto min-w-max">
                <tbody>
                    <tr>
                        <td class="p-4 bg-blue-gray-100 border-b border-gray-200 bg-blue-gray-100">
                            <span class="font-bold text-lg">証明写真</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left min-w-max h-20">
                <tbody>
                    <tr>
                        <th class="p-4  bg-gray-100 rounded-tl-xl w-52 max-md:w-40">
                            <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                                証明写真
                            </p>
                        </th>
                        <td class="p-4">
                            <div class="flex">
                                <div class="px-5">
                                    <label>
                                        <span class="text-white bg-indigo-500 border-0 px-5 py-3 focus:outline-none hover:bg-indigo-600 rounded max-md:px-3 max-md:text-sm"><i class="fa-solid fa-cloud-arrow-up mr-2"></i>写真をアップロード</span>
                                        <input class="hidden" id="photo" name="photo" type="file" accept=".jpg, .jpeg, .png" @change="handleFileChange" />
                                    </label>
                                </div>
                                <div class="ml-24">
                                    <button class="float-right" @click="removeImage" v-if="props.formData.photo"><i class="fa-solid fa-xmark fa-lg"></i></button>
                                    <img :src="props.formData.photo" v-if="props.formData.photo" />
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>