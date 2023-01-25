import {extend, setInteractionMode} from 'vee-validate'
import {required, email, confirmed} from 'vee-validate/dist/rules'

setInteractionMode('eager')
extend('email', {
    ...email,
    message: 'Email must be valid',
})

extend('min', {
    validate(value, args) {
        return value.length >= args.length;
    },
    params: ['length'],
    message: 'The {_field_} length must be more than {length} '
});

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
})

extend("confirmed", {
    ...confirmed,
    message: "The password does not match",
})


