<template>
    <v-layout column align-center class="mt-10">
        <h1 class="display-1">Vue Laravel Application</h1>
        <p>Click user icon to SignUp or check users list</p>
        <ul>
            <li>Check your env</li>
            <li>Run migrate and seed</li>
            <li>Run queue</li>
            <li>SMS service - https://www.twilio.com</li>
            <li>STMP - https://mailtrap.io</li>
            <li>!All services on test mode</li>
        </ul>
        <p>Recommend to do</p>
        <ul>
            <li>Create Job to send sms</li>
            <li>Create Job to send Welcome email</li>
            <li>Catch front end catch validations error</li>
        </ul>
    </v-layout>
</template>
<script>
export default {
    name: "Home"
}
</script>

