$.fn.spinInput = function (options) {
    var settings = $.extend({
        maximum: 1000,
        minimum: 0,
        value: 1,
        onChange: null
    }, options);

    return this.each(function (index, item) {
        var min = $(item).find('>*:first-child').first();
        var max = $(item).find('>*:last-child').first();
        var v_span = $(item).find('>*:nth-child(2)').find('span');
        var v_input = $(item).find('>*:nth-child(2)').find('input');
        var value = settings.value;
        $(v_input).val(value);
        $(v_span).text(value);
        async function increment() {
            value = Number.parseInt($(v_input).val());
            if ((value - 1) > settings.maximum) return;
            value++;
            $(v_input).val(value);
            $(v_span).text(value);
            if (settings.onChange) settings.onChange(value);
        }
        async function desincrement() {
            value = Number.parseInt($(v_input).val());
            if ((value - 1) < settings.minimum) return;
            value--
            $(v_input).val(value);
            $(v_span).text(value);
            if (settings.onChange) settings.onChange(value);
        }
        var pressTimer;

        function actionHandler(btn, fct, time = 100, ...args) {
            function longHandler() {
                pressTimer = window.setTimeout(function () {
                    fct(...args);
                    clearTimeout(pressTimer);
                    longHandler()
                }, time);
            }
            $(btn).mouseup(function () {
                clearTimeout(pressTimer);
            }).mousedown(function () {
                longHandler();
            });

            $(btn).click(function () {
                fct(...args);
            });
        }

        actionHandler(min, desincrement, 100);
        actionHandler(max, increment, 100)
    })
}




$('body').ready(function () {
    $('.spin-input').spinInput({ value: 1, minimum: 1 });
});