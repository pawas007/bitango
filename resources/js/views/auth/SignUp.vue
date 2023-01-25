<template>
    <v-layout>
        <v-row class="justify-center mt-9">
            <v-col cols="6">
                <h4 class="text-h4 text-center mb-5">Sign Up</h4>
                <validation-observer
                    ref="signupForm"
                    v-slot="{ invalid }">
                    <form @submit.prevent="signup">
                        <validation-provider
                            class="mt-2 d-block"
                            v-slot="{ errors }"
                            name="Name"
                            rules="required">
                            <v-text-field
                                outlined
                                v-model="user.name"
                                :error-messages="errors"
                                label="Name"
                            ></v-text-field>
                        </validation-provider>
                        <validation-provider
                            class="mt-2 d-block"
                            v-slot="{ errors }"
                            name="Email"
                            rules="required|email">
                            <v-text-field
                                outlined
                                v-model="user.email"
                                :error-messages="errors"
                                label="E-mail"
                            ></v-text-field>
                        </validation-provider>
                        <validation-provider
                            class="mt-2 d-block"
                            v-slot="{ errors }"
                            name="Country"
                            rules="required">
                            <v-autocomplete
                                :change="countryObserver"
                                outlined
                                :items="countries"
                                item-text="item.name"
                                label="Country"
                                value="item.name"
                                v-model="currentCountry"
                                :error-messages="errors"
                                @change="(item) => countryObserver(item)"
                            >
                                <template slot="selection" slot-scope="{ item, selected }">
                                    <p class='mb-0'><span class="mr-2" v-html="item.flag"></span> {{ item.name }}
                                    </p>
                                </template>
                                <template slot="item" slot-scope="{ item, tile }">
                                    <p class='mb-0'><span class="mr-2" v-html="item.flag"></span>{{ item.name }}
                                    </p>
                                </template>
                            </v-autocomplete>
                        </validation-provider>
                        <validation-provider
                            class="mt-2 d-block"
                            v-slot="{ errors }"
                            name="Password"
                            rules="required|min:8">
                            <v-text-field
                                outlined
                                :append-icon="showPass ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="showPass ? 'text' : 'password'"
                                v-model="user.password"
                                :error-messages="errors"
                                label="Password"
                                @click:append="showPass = !showPass"
                            ></v-text-field>
                        </validation-provider>
                        <validation-provider
                            class="mt-2 d-block"
                            v-slot="{ errors }"
                            name="Password confirmed"
                            rules="required|confirmed:Password">
                            <v-text-field
                                outlined
                                :append-icon="showPassCompf ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="showPassCompf  ? 'text' : 'password'"
                                v-model="user.password_confirmation"
                                :error-messages="errors"
                                label="Password conformation"
                                @click:append="showPassCompf = !showPassCompf "
                            ></v-text-field>
                        </validation-provider>
                        <v-alert type="success" v-if="successAlert">
                            Sign Up success.
                        </v-alert>
                        <div class="form_buttons mt-4">
                            <v-btn
                                class="mr-4"
                                type="submit">
                                Sign Up
                            </v-btn>
                            <v-btn @click="clear">
                                Clear
                            </v-btn>
                        </div>
                    </form>
                </validation-observer>
            </v-col>
        </v-row>
    </v-layout>
</template>
<script>

import countries from '../../data/countries.json'
import {ValidationObserver, ValidationProvider} from 'vee-validate'
import '../../libs/rules'
import axios from "../../libs/axios";

export default {
    name: "Register",
    components: {
        ValidationProvider,
        ValidationObserver,
    },

    data: () => ({
        successAlert: false,
        countries: countries,
        showPass: false,
        showPassCompf: false,
        currentCountry: null,
        countryPhoneCode: null,
        user: {
            name: 'Ostap',
            email: 'trushostap@gmail.com',
            number: '+380989584976',
            country: 'Ukraine',
            password: 'ostap666',
            password_confirmation: 'ostap666'
        },

    }),
    methods: {
        signup() {
            this.$refs.signupForm.validate().then((r) => {
                if (r) {
                    axios.post('register', this.user).then((res) => {
                        this.successAlert = true
                        this.clear()
                        setTimeout(() => {
                            this.successAlert = false
                        }, 2000)
                    })
                }

            })
        },
        clear() {
            this.showPass = false;
            this.showPassCompf = false;
            this.currentCountry = null;
            this.countryPhoneCode = null;
            this.user.country = '';
            this.user.country = '';
            this.user.name = '';
            this.user.email = '';
            this.user.number = '';
            this.user.password = '';
            this.user.password_confirmation = '';
            this.$refs.signupForm.reset()
        },
        countryObserver(country) {
            if (country) {
                this.countryPhoneCode = country.idd
                this.user.country = country.name
            } else {
                this.user.country = ''
                this.countryPhoneCode = null
            }
        }
    },

}
</script>
