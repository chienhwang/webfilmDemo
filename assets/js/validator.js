
function Validator(options) {
    var selectorRules = {};
    // get element form 
    var formElement = document.querySelector(options.form);
    if (formElement) {
        options.rules.forEach(function (rule) {

            //save rule as input
                if(Array.isArray(selectorRules[rule.selector])){
                    selectorRules[rule.selector].push(rule.test);
                }
                else{
                    selectorRules[rule.selector] =[rule.test];
                }

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
        var errorMessage ;
        // get rules of selector 
        var rules = selectorRules[rule.selector];
        //loop rules and check 
        for(var i=0;i<rules.length;++i){
            errorMessage = rules[i](inputElement.value);
            if(errorMessage) break; //if err -> break
        }
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
// return message error
Validator.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui l??ng nh???p tr?????ng n??y !'
        }
    }
}
Validator.isEmail = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Vui l??ng nh???p ????ng email';
        }
    }
}
Validator.PassWord = function (selector,min) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : `Vui l??ng nh???p t???i thi???u ${min} k?? t???`;  
        }
    }
}

Validator.ConfirmPassWord = function (selector,getConfirmPassWord,message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmPassWord() ? undefined :message || 'Gi?? tr??? nh???p v??o kh??ng ch??nh x??c';
        }
    }
}


//setObject
Validator(
    {
        form: '#form-1',
        errorSelector:'.form-message',
        rules:
            [
                Validator.isRequired('#fullname'),
                Validator.isRequired('#email'),
                Validator.isEmail('#email'),
                Validator.isRequired('#password'),
                Validator.PassWord('#password',6),
                Validator.ConfirmPassWord('#password_confirm',function(){
                    return document.querySelector('#form-1 #password').value;
                },'Nh???p m???t kh???u kh??ng ch??nh x??c')
            ]
    });



//end validate input


