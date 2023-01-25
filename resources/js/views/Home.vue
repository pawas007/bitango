<template>
    <v-layout column align-center class="mt-10">
            <h1 class="display-1">Vue Laravel Application</h1>
            <p>
                Click user icon to SignUp or check users list
            </p>
            <ul>
                <li>
                    Check your env
                </li>
                <li>
                    Run migrate and seed
                </li>
                <li>
                    Run queue
                </li>
                <li>SMS service - https://www.twilio.com</li>
                <li>STMP - https://mailtrap.io</li>
            </ul>
        </v-layout>
</template>
<script>
export default {
    name: "Home"
}
</script>

