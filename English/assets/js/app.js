let $ = document

const signInOuterBtn = $.querySelector('#sign-in__btn')
const signUpOuterBtn = $.querySelector('#register__btn')
const signInSubmitBtn = $.querySelector('#sign-in__submit-btn')
const signUpSubmitBtn = $.querySelector('#register__submit-btn')
const verifyOuterBtn = $.querySelector('#verify__btn')
const verifySubmitBtn = $.querySelector('#verify__submit-btn')

const signInnameValidationText = $.querySelector('#sign-in__name-input-valid-feedback')
const signInphoneValidationText = $.querySelector('#sign-in__phone-input-valid-feedback')
const signUpnameValidationText = $.querySelector('#register__name-input-valid-feedback')
const signUpEmailValidationText = $.querySelector('#register__email-input-valid-feedback')
const signUpphoneValidationText = $.querySelector('#register__phone-input-valid-feedback')
const verifyEmailValidationText = $.querySelector('#verify-input-valid-feedback')

const signInnameInput = $.querySelector('#sign-in__name-input')
const signInphoneInput = $.querySelector('#sign-in__phone-input')
const signUpnameInput = $.querySelector('#register__name-input')
const signUpEmailInput = $.querySelector('#register__email-input')
const signUpphoneInput = $.querySelector('#register__phone-input')
const verifyEmailInput = $.querySelector('#verify-input')

let signInnameInputFlag = false
let signInphoneInputFlag = false
let signUpnameInputFlag = false
let signUpEmailInputFlag = false
let signUpphoneInputFlag = false
let verifyEmailInputFlag = false

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/
function signInnameCheckInputFalse() {
    signInnameInput.classList.remove('valid-feedback')
    signInnameInput.classList.add('invalid-feedback')
    $.querySelector('.sign-in__name-input-container').classList.add('mb-2')
    signInnameValidationText.innerHTML = 'email must be end with @gmail.com'
    signInnameValidationText.style.color = '#c80000'
    $.querySelector('.sign-in__name-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.sign-in__name-input-container .valid-feedback-icon').classList.remove('d-block')
}

function signInnameCheckInputTrue() {
    $.querySelector('.sign-in__name-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.sign-in__name-input-container .valid-feedback-icon').classList.add('d-block')
    signInnameValidationText.innerHTML = ''
    signInnameInput.classList.remove('invalid-feedback')
    signInnameInput.classList.add('valid-feedback')
    $.querySelector('.sign-in__name-input-container').classList.remove('mb-2')
}

function signInphoneCheckInputFalse() {
    signInphoneInput.classList.remove('valid-feedback')
    signInphoneInput.classList.add('invalid-feedback')
    $.querySelector('.sign-in__phone-input-container').classList.add('mb-2')
    signInphoneValidationText.innerHTML = 'phone must be a-z and 1-9'
    signInphoneValidationText.style.color = '#c80000'
    $.querySelector('.sign-in__phone-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.sign-in__phone-input-container .valid-feedback-icon').classList.remove('d-block')
}

function signInphoneCheckInputTrue() {
    $.querySelector('.sign-in__phone-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.sign-in__phone-input-container .valid-feedback-icon').classList.add('d-block')
    signInphoneValidationText.innerHTML = ''
    signInphoneInput.classList.remove('invalid-feedback')
    signInphoneInput.classList.add('valid-feedback')
    $.querySelector('.sign-in__phone-input-container').classList.remove('mb-2')
}

function signUpnameCheckInputFalse() {
    signUpnameInput.classList.remove('valid-feedback')
    signUpnameInput.classList.add('invalid-feedback')
    $.querySelector('.register__name-input-container').classList.add('mb-2')
    signUpnameValidationText.innerHTML = 'name must be a-z'
    signUpnameValidationText.style.color = '#c80000'
    $.querySelector('.register__name-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.register__name-input-container .valid-feedback-icon').classList.remove('d-block')
}

function signUpnameCheckInputTrue() {
    $.querySelector('.register__name-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.register__name-input-container .valid-feedback-icon').classList.add('d-block')
    signUpnameValidationText.innerHTML = ''
    signUpnameInput.classList.remove('invalid-feedback')
    signUpnameInput.classList.add('valid-feedback')
    $.querySelector('.register__name-input-container').classList.remove('mb-2')
}

function signUpEmailCheckInputFalse() {
    signUpEmailInput.classList.remove('valid-feedback')
    signUpEmailInput.classList.add('invalid-feedback')
    $.querySelector('.register__email-input-container').classList.add('mb-2')
    signUpEmailValidationText.innerHTML = 'email must be end with @gmail.com'
    signUpEmailValidationText.style.color = '#c80000'
    $.querySelector('.register__email-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.register__email-input-container .valid-feedback-icon').classList.remove('d-block')
}

function signUpEmailCheckInputTrue() {
    $.querySelector('.register__email-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.register__email-input-container .valid-feedback-icon').classList.add('d-block')
    signUpEmailValidationText.innerHTML = ''
    signUpEmailInput.classList.remove('invalid-feedback')
    signUpEmailInput.classList.add('valid-feedback')
    $.querySelector('.register__email-input-container').classList.remove('mb-2')
}

function signUpphoneCheckInputFalse() {
    signUpphoneInput.classList.remove('valid-feedback')
    signUpphoneInput.classList.add('invalid-feedback')
    $.querySelector('.register__phone-input-container').classList.add('mb-2')
    signUpphoneValidationText.innerHTML = 'phone must be 1-9'
    signUpphoneValidationText.style.color = '#c80000'
    $.querySelector('.register__phone-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.register__phone-input-container .valid-feedback-icon').classList.remove('d-block')
}

function signUpphoneCheckInputTrue() {
    $.querySelector('.register__phone-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.register__phone-input-container .valid-feedback-icon').classList.add('d-block')
    signUpphoneValidationText.innerHTML = ''
    signUpphoneInput.classList.remove('invalid-feedback')
    signUpphoneInput.classList.add('valid-feedback')
    $.querySelector('.register__phone-input-container').classList.remove('mb-2')
}

function verifyEmailCheckInputFalse() {
    verifyEmailInput.classList.remove('valid-feedback')
    verifyEmailInput.classList.add('invalid-feedback')
    $.querySelector('.verify-input-container').classList.add('mb-2')
    verifyEmailValidationText.innerHTML = 'Token must be 1-9'
    verifyEmailValidationText.style.color = '#c80000'
    $.querySelector('.verify-input-container .invalid-feedback-icon').classList.add('d-block')
    $.querySelector('.verify-input-container .valid-feedback-icon').classList.remove('d-block')
}

function verifyEmailCheckInputTrue() {
    $.querySelector('.verify-input-container .invalid-feedback-icon').classList.remove('d-block')
    $.querySelector('.verify-input-container .valid-feedback-icon').classList.add('d-block')
    verifyEmailValidationText.innerHTML = ''
    verifyEmailInput.classList.remove('invalid-feedback')
    verifyEmailInput.classList.add('valid-feedback')
    $.querySelector('.verify-input-container').classList.remove('mb-2')
}

if (signInSubmitBtn) {
    signInSubmitBtn.addEventListener('click', event => {
        const emailRegex = /^\w+([\.-]?\w)*@\w+([\.-]?\w)*(\.\w{2,3})+$/;
        let regexResult = emailRegex.test(signInnameInput.value)

        signUpnameInputFlag = false
        signUpEmailInputFlag = false
        signUpphoneInputFlag = false
        verifyEmailInputFlag = false

        if (signInnameInput.value.length < 1 || !regexResult) {
            event.preventDefault()
            signInnameCheckInputFalse()
            signInnameInput.value = ''
            $.querySelector('.sign-in__name-input-container label').classList.add('label-top')
            signInnameInputFlag = true

            signInnameInput.addEventListener('keyup', e => {
                if (signInnameInput.value.length >= 1) {
                    signInnameValidationText.innerHTML = ''
                    let trueEmail = emailRegex.test(signInnameInput.value)
                    if (trueEmail) {
                        signInnameCheckInputTrue()
                    } else {
                        signInnameCheckInputFalse()
                        signInnameValidationText.innerHTML = ''
                    }
                } else {
                    signInnameCheckInputFalse()
                }
            })
        }
    })
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

if (signUpSubmitBtn) {
    signUpSubmitBtn.addEventListener('click', event => {
        const emailRegex = /^\w+([\.-]?\w)*@\w+([\.-]?\w)*(\.\w{2,3})+$/;

        let regexResult = emailRegex.test(signUpEmailInput.value)

        signInnameInputFlag = false
        signInphoneInputFlag = false
        verifyEmailInputFlag = false
        if (signUpnameInput.value.length < 1) {
            event.preventDefault()
            signUpnameCheckInputFalse()
            $.querySelector('.register__name-input-container label').classList.add('label-top')
            signUpnameInputFlag = true

            signUpnameInput.addEventListener('keyup', e => {
                if (signUpnameInput.value.length >= 1) {
                    if (signUpnameInput.value.length >= 3) {
                        signUpnameCheckInputTrue()
                    } else {
                        signUpnameCheckInputFalse()
                        signUpnameValidationText.innerHTML = ''
                    }
                } else {
                    signUpnameCheckInputFalse()
                }
            })
        }

        if (signUpEmailInput.value.length < 1 || !regexResult) {
            event.preventDefault()
            signUpEmailCheckInputFalse()
            signUpEmailInput.value = ''
            $.querySelector('.register__email-input-container label').classList.add('label-top')
            signUpEmailInputFlag = true

            signUpEmailInput.addEventListener('keyup', e => {
                if (signUpEmailInput.value.length >= 1) {
                    signUpEmailValidationText.innerHTML = ''
                    let trueEmail = emailRegex.test(signUpEmailInput.value)
                    if (trueEmail) {
                        signUpEmailCheckInputTrue()
                    } else {
                        signUpEmailCheckInputFalse()
                        signUpEmailValidationText.innerHTML = ''
                    }
                } else {
                    signUpEmailCheckInputFalse()
                }
            })
        }

        if (signUpphoneInput.value.length < 1) {
            event.preventDefault()
            signUpphoneCheckInputFalse()
            $.querySelector('.register__phone-input-container label').classList.add('label-top')
            signUpphoneInputFlag = true

            signUpphoneInput.addEventListener('keyup', e => {
                if (signUpphoneInput.value.length >= 1) {
                    if (signUpphoneInput.value.length >= 9) {
                        signUpphoneCheckInputTrue()
                    } else {
                        signUpphoneCheckInputFalse()
                        signUpphoneValidationText.innerHTML = ''
                    }
                } else {
                    signUpphoneCheckInputFalse()
                }
            })
        }
    })
}

if (verifySubmitBtn) {
    verifySubmitBtn.addEventListener('click', event => {

        signInnameInputFlag = false
        signUpnameInputFlag = false
        signInphoneInputFlag = false
        signUpphoneInputFlag = false
        signUpEmailInputFlag = false

        if (verifyEmailInput.value.length < 1 || !regexResult) {
            event.preventDefault()
            verifyEmailCheckInputFalse()
            verifyEmailInput.value = ''
            $.querySelector('.verify-input-container label').classList.add('label-top')
            verifyEmailInputFlag = true

            verifyEmailInput.addEventListener('keyup', e => {
                if (verifyEmailInput.value.length >= 1) {
                    verifyEmailValidationText.innerHTML = ''
                    if (verifyEmailInput.value.length == 5) {
                        verifyEmailCheckInputTrue()
                    } else {
                        verifyEmailCheckInputFalse()
                        verifyEmailValidationText.innerHTML = ''
                    }
                } else {
                    verifyEmailCheckInputFalse()
                }
            })
        }
    })
}

if (signInnameInput) {
    signInnameInput.addEventListener('focus', event => {
        if (!signInnameInputFlag) {
            signInnameInput.classList.add('outline-1')
        }
    })
    signInnameInput.addEventListener('blur', event => {
        if (signInnameInput.value.length >= 1) {
            $.querySelector('.sign-in__name-input-container label').classList.add('label-top')
        } else {
            if (signInnameInputFlag) {
                $.querySelector('.sign-in__name-input-container label').classList.add('label-top')
            } else {
                $.querySelector('.sign-in__name-input-container label').classList.remove('label-top')
            }
        }
        signInnameInput.classList.remove('outline-1')
    })
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

if (signInphoneInput) {
    signInphoneInput.addEventListener('keypress', event => {
        const numberCode = event.keyCode;

        if (numberCode < 48 || numberCode > 57) {
            event.preventDefault();
        }
    })
    signInphoneInput.addEventListener('focus', event => {
        if (!signInphoneInputFlag) {
            signInphoneInput.classList.add('outline-1')
        }
    })
    signInphoneInput.addEventListener('blur', event => {
        if (signInphoneInput.value.length >= 1) {
            $.querySelector('.sign-in__phone-input-container label').classList.add('label-top')
        } else {
            if (signInphoneInputFlag) {
                $.querySelector('.sign-in__name-input-container label').classList.add('label-top')

            } else {
                $.querySelector('.sign-in__phone-input-container label').classList.remove('label-top')
            }
        }
        signInphoneInput.classList.remove('outline-1')
    })
}

if (signUpnameInput) {
    signUpnameInput.addEventListener('keypress', event => {
        let word = event.keyCode;

        console.log(word)
        if ((word < 65 || word > 90) && (word < 97 || word > 122) && word != 32) {
            event.preventDefault();
        }
    })
    signUpnameInput.addEventListener('focus', event => {
        if (!signUpnameInputFlag) {
            signUpnameInput.classList.add('outline-1')
        }
    })
    signUpnameInput.addEventListener('blur', event => {
        if (signUpnameInput.value.length >= 1) {
            $.querySelector('.register__name-input-container label').classList.add('label-top')
        } else {
            if (signUpnameInputFlag) {
                $.querySelector('.register__name-input-container label').classList.add('label-top')
            } else {
                $.querySelector('.register__name-input-container label').classList.remove('label-top')
            }
        }
        signUpnameInput.classList.remove('outline-1')
    })
}

if (signUpEmailInput) {
    signUpEmailInput.addEventListener('focus', event => {
        if (!signUpEmailInputFlag) {
            signUpEmailInput.classList.add('outline-1')
        }
    })
    signUpEmailInput.addEventListener('blur', event => {
        if (signUpEmailInput.value.length >= 1) {
            $.querySelector('.register__email-input-container label').classList.add('label-top')
        } else {
            if (signUpEmailInputFlag) {
                $.querySelector('.register__name-input-container label').classList.add('label-top')
            } else {
                $.querySelector('.register__email-input-container label').classList.remove('label-top')
            }
        }
        signUpEmailInput.classList.remove('outline-1')
    })
}

if (signUpphoneInput) {
    signUpphoneInput.addEventListener('keypress', event => {
        const numberCode = event.keyCode;

        if (numberCode < 48 || numberCode > 57) {
            event.preventDefault();
        }
    })
    signUpphoneInput.addEventListener('focus', event => {
        if (!signUpphoneInputFlag) {
            signUpphoneInput.classList.add('outline-1')
        }
    })
    signUpphoneInput.addEventListener('blur', event => {
        if (signUpphoneInput.value.length >= 1) {
            $.querySelector('.register__phone-input-container label').classList.add('label-top')
        } else {
            if (signUpphoneInputFlag) {
                $.querySelector('.register__name-input-container label').classList.add('label-top')
            } else {
                $.querySelector('.register__phone-input-container label').classList.remove('label-top')
            }
        }
        signUpphoneInput.classList.remove('outline-1')
    })
}

/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/

if (verifyEmailInput) {
    verifyEmailInput.addEventListener('keypress', event => {
        const numberCode = event.keyCode;

        if (numberCode < 48 || numberCode > 57) {
            event.preventDefault();
        }
    })
    verifyEmailInput.addEventListener('focus', event => {
        if (!verifyEmailInputFlag) {
            verifyEmailInput.classList.add('outline-1')
        }
    })
    verifyEmailInput.addEventListener('blur', event => {
        if (verifyEmailInput.value.length >= 1) {
            $.querySelector('.verify-input-container label').classList.add('label-top')
        } else {
            if (verifyEmailInputFlag) {
                $.querySelector('.verify-input-container label').classList.add('label-top')
            } else {
                $.querySelector('.verify-input-container label').classList.remove('label-top')
            }
        }

        verifyEmailInput.classList.remove('outline-1')
    })
}




/* 
** Developed by Hero Expert 
** Telegram channel : @HeroExpert_ir 
*/