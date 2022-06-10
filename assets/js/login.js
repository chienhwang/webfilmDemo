
function Validator(options) {
    // get element form 
    var formElement = document.querySelector(options.form);
    if (formElement) {
        options.rules.forEach(function (rule) {
            var inputElement = formElement.querySelector(rule.selector);
            var errorElement = inputElement.parentElement.querySelector(options.errorSelector);

            if (inputElement) {
                //user blur out input
                inputElement.onblur = function () {
                    Validate(inputElement,rule,errorElement)
                }
                // user oninput
                inputElement.oninput = function(){
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('inValid')
                }
            }
        });
    }
    // validate funtion
  function  Validate(inputElement,rule,errorElement){
        var errorMessage = rule.test(inputElement.value);
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            console.log(inputElement.parentElement)
            inputElement.parentElement.classList.add('inValid');

        } else {
            errorElement.innerText = '';
            inputElement.parentElement.classList.remove('inValid')

        }
    }
}
// co loi retur message loi~
// hop le thi k tra ra gi.
Validator.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui lòng nhập trường này !'
        }
    }
}
Validator.isEmail = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập đúng email';
        }
    }
}
Validator.PassWord = function (selector,min) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự`;  
        }
    }
}

Validator.ConfirmPassWord = function (selector,getConfirmPassWord) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmPassWord() ? undefined : 'Giá trị nhập vào không chính xác';
        }
    }
}


Validator(
    {
        form: '#form-1',
        errorSelector:'.form-message',
        rules:
            [
                Validator.isRequired('#id'),
                Validator.PassWord('#password'),
            ]
    });


//end validate input
  

