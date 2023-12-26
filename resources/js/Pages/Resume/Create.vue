<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { ref, reactive } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import { getToday } from '@/common';
    import Stepper from './ResumeForm/Stepper.vue';
    import Profile from './ResumeForm/Profile.vue';
    import Address from './ResumeForm/Address.vue';
    import Contact from './ResumeForm/Contact.vue';
    import Photo from './ResumeForm/Photo.vue';
    import EduHistory from './ResumeForm/EduHistory.vue';
    import JobHistory from './ResumeForm/JobHistory.vue';
    import License from './ResumeForm/License.vue';
    import Reason from './ResumeForm/Reason.vue';
    import Requests from './ResumeForm/Requests.vue';
    import CreateDate from './ResumeForm/CreateDate.vue';
    import Confirm from './ResumeForm/Confirm.vue';
    import NavigationButton from './ResumeForm/NavigationButton.vue';

    const components = {
        Stepper, Profile, Address, Contact, Photo, EduHistory, JobHistory,
        License, Reason, Requests, CreateDate, Confirm, NavigationButton
    };

    let currentPage = ref(1);

    const checkCurrentPage = (number) => ({
        'current-page': currentPage.value === number,
        'passed-page': currentPage.value > number,
    });

    const handleCurrentPageChanged = (newPage) => {
        currentPage.value = newPage;
    };

    const nextCurrentPage = () => currentPage.value++;
    const prevCurrentPage = () => currentPage.value--;

    const allFormData = {
        profileForm: reactive({
            kanji_last_name: null, kanji_first_name: null, furigana_last_name: null, furigana_first_name: null, 
            birth_year: null, birth_month: null, birth_day: null, age: null, gender: '',
        }),

        addressForm: reactive({
            zip_code1: null, address1: null, building_name1: null, address1_furigana: null, 
            zip_code2: null, address2: null, building_name2: null, address2_furigana: null, 
        }),

        contactForm: reactive({
            phone_number1: null, phone_number2: null, phone_number3: null, email: null,
            other_phone_number1: null, other_phone_number2: null, other_phone_number3: null, other_email: null,
        }),

        photoForm: reactive({ photo: null }),

        eduHistoryForm: reactive({
            edu_history1_year: null, edu_history1_month: null, edu_history1: null, edu_history2_year: null, edu_history2_month: null, edu_history2: null,
            edu_history3_year: null, edu_history3_month: null, edu_history3: null, edu_history4_year: null, edu_history4_month: null, edu_history4: null,
            edu_history5_year: null, edu_history5_month: null, edu_history5: null, edu_history6_year: null, edu_history6_month: null, edu_history6: null,
            edu_history7_year: null, edu_history7_month: null, edu_history7: null, edu_history8_year: null, edu_history8_month: null, edu_history8: null,
            edu_history9_year: null, edu_history9_month: null, edu_history9: null, edu_history10_year: null, edu_history10_month: null, edu_history10: null,
        }),

        jobHistoryForm: reactive({
            job_history1_year: null, job_history1_month: null, job_history1: null, job_history2_year: null, job_history2_month: null, job_history2: null,
            job_history3_year: null, job_history3_month: null, job_history3: null, job_history4_year: null, job_history4_month: null, job_history4: null,
            job_history5_year: null, job_history5_month: null, job_history5: null, job_history6_year: null, job_history6_month: null, job_history6: null,
            job_history7_year: null, job_history7_month: null, job_history7: null, job_history8_year: null, job_history8_month: null, job_history8: null,
            job_history9_year: null, job_history9_month: null, job_history9: null, job_history10_year: null, job_history10_month: null, job_history10: null,
        }),

        licenseForm: reactive({
            license1_year: null, license1_month: null, license1: null, license2_year: null, license2_month: null, license2: null,
            license3_year: null, license3_month: null, license3: null, license4_year: null, license4_month: null, license4: null,
        }),

        reasonForm: reactive({ reason: null }),

        requestsForm: reactive({ requests: null }),

        createDateForm: reactive({ create_date: getToday() })
    }

    const createPdf = () => {
        Inertia.post('/resume', allFormData)
    }
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">履歴書作成</h2>
                <button @click="createPdf" class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-xm delete-confirm mr-5"><i class="fa-solid fa-file-arrow-down mr-2"></i>履歴書をダウンロード</button>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Stepper :currentPage="currentPage" :checkCurrentPage="checkCurrentPage" @currentPageChanged="handleCurrentPageChanged" />
                        <Profile v-if="currentPage === 1" :formData="allFormData.profileForm" />
                        <Address v-else-if="currentPage === 2" :formData="allFormData.addressForm" />
                        <Contact v-else-if="currentPage === 3" :formData="allFormData.contactForm" />
                        <Photo v-else-if="currentPage === 4" :formData="allFormData.photoForm" />
                        <EduHistory v-else-if="currentPage === 5" :formData="allFormData.eduHistoryForm" />
                        <JobHistory v-else-if="currentPage === 6" :formData="allFormData.jobHistoryForm" />
                        <License v-else-if="currentPage === 7" :formData="allFormData.licenseForm" />
                        <Reason v-else-if="currentPage === 8" :formData="allFormData.reasonForm" />
                        <Requests v-else-if="currentPage === 9" :formData="allFormData.requestsForm" />
                        <CreateDate v-else-if="currentPage === 10" :formData="allFormData.createDateForm" />
                        <Confirm v-else-if="currentPage === 11" :formData="allFormData" :checkCurrentPage="checkCurrentPage" @currentPageChanged="handleCurrentPageChanged" />
                        <NavigationButton :currentPage="currentPage" :prevCurrentPage="prevCurrentPage" :nextCurrentPage="nextCurrentPage" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
