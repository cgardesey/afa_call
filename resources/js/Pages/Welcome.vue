<script setup>

    defineProps({
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    });

    import Swal from 'sweetalert2';
    import {reactive, ref} from 'vue';

    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    // Data
    const form = useForm({
        caller_phonenumber: '',
        callee_phonenumber: '',
    });

    let processing = ref(false);

    // Methods
    const onSubmit = function () {
        processing.value = true;

        /*form.post('place-call', form, {
            onStart: () => {processing.value = true},
            onFinish: () => {processing.value = false}
        });
*/
        axios.post('place-call', form)
            .then(response => {
                processing.value = false;
                form.callee_phonenumber = '';
                console.log(response.data);
                if (JSON.stringify(response).includes('Invite action successfully executed for use')) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Call successfully initiated',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }
                else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Error occured',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                processing.value = false;
                console.log(error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Error occured',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    }

</script>

<template>
    <Head title="Afa Call Verify"/>


    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div>
            <flash-message></flash-message>
            <div>
                <form @submit.prevent="onSubmit">
                    <div>
                        <InputLabel for="caller_phonenumber" value="Caller Phone Number" />
                        <TextInput
                                id="caller_phonenumber"
                                v-model="form.caller_phonenumber"
                                type="tel"
                                placeholder="0540505362"
                                pattern="^(0\d{9})$"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="caller_phonenumber"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="callee_phonenumber" value="Callee Phone Number" />
                        <TextInput
                                id="callee_phonenumber"
                                v-model="form.callee_phonenumber"
                                type="tel"
                                placeholder="0540505362"
                                pattern="^(0\d{9})$"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="callee_phonenumber"
                        />
                    </div>
                    <div class="flex items-center justify-end mt-4">

                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="processing">
                            Call
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticationCard>
</template>

