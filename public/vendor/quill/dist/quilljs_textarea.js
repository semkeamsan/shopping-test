function quilljs_textarea(elem = null, options = null) {
    if(elem) {
        var staffElems = Array.prototype.slice.call(document.querySelectorAll(elem));
    } else {
        var staffElems = Array.prototype.slice.call(document.querySelectorAll('[data-quilljs]'));
    }
    staffElems.forEach(function(el) {
    if(elem && el.hasAttribute("data-quilljs")) {
        return;
    }
    var elemType = el.type;
    if(elemType == 'textarea') {
        elemValue = el.value;
        staffDiv = document.createElement('div');
        staffDiv.innerHTML = elemValue;
        el.parentNode.insertBefore(staffDiv, el.nextSibling);
        el.style.display = "none";
        var placeholder = el.placeholder;
    } else {
        var placeholder = null;
        staffDiv = el;
    }
    if(!options) {
        var default_options = {
        theme: 'snow',
        placeholder: placeholder,
        };
    } else {
        if(!options.placeholder) {
        options.placeholder = placeholder;
        }
        var default_options = options;
    }

    var staff = new Quill(staffDiv, default_options);
    staff.on('text-change', function(delta, oldDelta, source) {
        var staff_value = staff.root.innerHTML;
        el.value = staff_value;
    });
    });
}
(function() {
    quilljs_textarea();
})();
