$(function() {
    $(`input`).prop("autocomplete", "off");
    $(`img`).attr(`draggable`, false);
    var ShowAndHidePassword = function() {
        var e = $(`[data-toggle="sh-password"]`);
        e.length && e.each(function() {
            var target = $(this).data('target');
            $(this).click(() => {
                if ($(target).attr('type') == 'password') {
                    $(target).attr('type', 'text');
                    $(this).find('i').removeClass().addClass('fal fa-eye-slash');
                } else {
                    $(target).attr('type', 'password');
                    $(this).find('i').removeClass().addClass('fal fa-eye');
                }
            });
        });
    }();
    var LiveInput = function() {
        $(document).on(`input`, `[data-toggle="live-input"],[live-input]`, function() {
            var val = $(this).val();
            var text = $(this).data('text');
            var target = $(this).data('target');
            if (val) {
                $(target).text(val);
            } else {
                $(target).text(text);
            }
        });
    }();

    var validation = function(form) {
        form.addEventListener(
            "submit",
            function(event) {
                form.classList.add("was-validated");
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            },
            false
        );
    };
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName("needs-validation");
    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function(form) {
        validation(form);
    });


    // $(`[data-toggle="ui-drag"]`).sortable({
    //     cursor: "move",
    //     containment: "body",
    // });



});

/**
 * Select2
 */
var select2 = ($element) => {
    $element.each(function() {
        var selected = [];
        $(this).find(`[selected]`).each(function() {
            selected.push($(this).val());
        });
        if (selected.length == 0) {
            selected = null;
        }
        $(this).select2({
            minimumResultsForSearch: $(this).find('option').length > 5 ? true : -1,
        }).val(selected).trigger('change');

    });

}




/**
 * Clone Add
 * data-toggle="clone" data-clone="#clone-value" data-del="#clone-del" data-target="#clone-append"
 */

var datetime = () => {
    return (new Date()).getTime();
};
var Clone = function($element, options) {
    var opt = {
        onadd: ($clone) => {},
        ondel: ($clone) => {},
    };
    options = $.extend(opt, options);
    var replace = $element.data('replace') ?? 0;

    $element.each(function() {
        $(this).unbind('click').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            var target = options.target ?? $(this).data('target');
            var clone = options.clone ?? $(this).data('clone');
            var html = $(clone).clone().prop('outerHTML');
            html = html.replaceAll('{' + replace + '}', datetime());
            var $clone = $(html);
            $clone.find(`[data-name]`).each(function() {
                var name = $(this).data('name');
                $(this).attr('name', `${name}`);
                $(this).removeAttr('data-name');
            });
            $clone.removeClass('d-none');
            $(target).append($clone);
            options.onadd($clone);
        });
    });

    /**
     * Clone Delete
     * data-toggle="clone-delete" data-target="#clone-value"
     */
    $(document).on(`click`, `[data-toggle="clone-delete"]`, function() {
        var target = $(this).data('target');
        options.ondel($(this).parents(target));
        $(this).parents(target).remove();
    });
}

 /**
     * Tab event
     */
  $(document).on('shown.bs.tab', function(e) {
    var target = $(e.target).attr('href');
    $(e.target).parents('form').find(`[name="tabactive"]`).remove();
    $(e.target).parents('form').append(`<input type="hidden" name="tabactive" value=${target}>`);
});

/**
 *  Editor     *
 */
 var editors = $(`textarea[data-toggle="editor"]`);
    if(editors.length){
        $.getScript(`https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js`).done(()=>{
            editors.each(function (e) {
                //ClassicEditor.getUrl(`${location.assign}/vendor/ckeditor/ckeditor.css`);
                ClassicEditor.create(this);

            });
        });
    }

