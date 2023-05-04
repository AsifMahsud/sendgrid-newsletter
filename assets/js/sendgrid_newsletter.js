jQuery(document).ready(function ($) {
    let checkboxes = document.querySelectorAll('.subscribe-form__checkbox input[type=checkbox]');
    const options = document.querySelectorAll('.subscribe-form-option');

    checkboxes.forEach((checkbox, index) => {
        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                options[index].classList.add('selected');
            } else {
                options[index].classList.remove('selected');
            }
        });
    });

    $('#subscribe-form').submit(function (event) {
        let newsletterValues = [];
        checkboxes = $("input[name='newsletter']:checked");
        if (checkboxes.length === 0) {
            $(".subscribe-form__message").css("display", "block");
            $("p.subscribe-form__message_error").css("display", "block").text("Please select at least one option 👇");
            event.preventDefault();
        } else {
            checkboxes.each(function () {
                newsletterValues.push($(this).val());
            });
            $("input[name='newsletter']").val(newsletterValues.join(' , '));
        }
    });
});
