<script setup lang="ts">
    import { useForm } from '@inertiajs/vue3';
    import BaseLayout from '@/Layouts/BaseLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import Button from '@/Components/Button.vue';
    import rectImgUrl from '../../../assets/svg/rect.svg';

    const form = useForm({
        email: null,
        password: null,
        remember: false,
    })

    const onSubmit = () => {
        form.post('/login');
        form.reset();
    } 
</script>

<template>
    <BaseLayout not-width-limit>
        <div class="relative h-full flex items-center justify-center">
            <img class="size-96 absolute top-0 left-0 firstBackImg" :src="rectImgUrl"/>
            <img class="size-96 absolute bottom-0 right-0 secondBackImg" :src="rectImgUrl"/>
            <form @submit.prevent="onSubmit" class="p-10 loginForm bg-white shadow-md rounded-xl flex flex-col">
                <h2 class="self-center text-orange-400 text-3xl font-medium">Вход</h2>
                <div class="flex flex-col">
                    <InputLabel :error="form.errors.email" title="Email">
                        <input type="email" name="email" v-model="form.email" required/>
                    </InputLabel>
                    <InputLabel :error="form.errors.password" title="Пароль">
                        <input type="password" name="password" v-model="form.password" required/>
                    </InputLabel>
                </div>
                <div class="mt-10">
                    <Button>Вход</Button>
                </div>
            </form>
        </div>
    </BaseLayout>
</template>

<style lang="css">
    .firstBackImg {
        transform: translate(-50%, -50%) rotate(45deg);
    }
    .secondBackImg {
        transform: translate(50%, 50%) rotate(45deg);
    }
    .loginForm {
        width: 600px;
    }
    .loginForm div label {
        margin-top: 30px;
    }
</style>