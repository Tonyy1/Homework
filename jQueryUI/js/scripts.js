$("#email").emailautocomplete({
    suggClass: "custom-classname",
    domains: ["example.com"]
});

$(function () {
    $("input[type=submit]").button();
    $("input[type=submit]").click(function () {
        alert("Registrace úspěšná");
    });

    var example = flatpickr('#flatpickr');

    // flatpickr('selector', options);
    flatpickr('#flatpickr', {

        // A string of characters which are used to define how the date will be displayed in the input box. 
        dateFormat: 'd-m-Y',

        // Allows the user to enter a date directly input the input field. By default, direct entry is disabled.
        allowInput: true,

    });

    $(".login-form").controlgroup({
        "direction": "vertical"
    });

    $('select').selectmenu();

});