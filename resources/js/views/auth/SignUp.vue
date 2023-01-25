<template>
    <v-container>
        <v-layout>
            <v-row class="justify-center mt-9">
                <v-col cols="6">
                    <h4 class="text-h4 text-center">Sign Up</h4>
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
                                    v-model="user.country"
                                    :error-messages="errors"
                                    @change="(item) => countryObserver(item)"
                                >
                                    <template slot="selection" slot-scope="{ item, selected }">
                                        <p class='mb-0'><span class="flag">{{ item.flag }}</span> {{ item.name }}
                                        </p>
                                    </template>
                                    <template slot="item" slot-scope="{ item, tile }">
                                        <v-list-tile-content>
                                            <p class='mb-0'><span class="flag">{{ item.flag }}</span>
                                                {{ item.name }}</p>
                                        </v-list-tile-content>
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
    </v-container>
</template>
<script>

import countries from '../../data/countries.json'
import { ValidationObserver, ValidationProvider} from 'vee-validate'



export default {
    name: "Register",
    components: {
        ValidationProvider,
        ValidationObserver,
    },

    data: () => ({
        countries: countries,
        showPass: false,
        showPassCompf: false,
        countryPhoneCode: null,
        user: {
            name: '',
            email: '',
            number: '',
            country: '',
            password: '',
            password_confirmation: ''
        },
        maskProperties: {
            prefix: '',
            suffix: '',
            readonly: false,
            disabled: false,
            outlined: false,
            clearable: false,
            placeholder: 'Phone',
        },
    }),

    methods: {
        signup() {
            this.$refs.signupForm.validate()
        },
        clear() {

            this.$refs.signupForm.reset()
        },
        countryObserver(country) {
            if (country) this.countryPhoneCode = country.idd
            else this.countryPhoneCode = null
            this.maskProperties.prefix = country.idd
        }
    },

}
</script>
