var Tree = function ($element, options) {
    var opt = {
        data: [],
        // onadd: ($t, data)=>{},
        // onedit: ($t, data)=>{},
        // ondel: ($t, data)=>{},
        callback: ($t, data) => {},
    };
    this.$0 = $element;
    this.options = $.extend(opt, options);
}
Tree.prototype = {
    init: function () {
        this.templates();
        this.$0.find('.collapse-all').click((e) => {
            e.preventDefault();
            this.$0.find('li').addClass('tree-show');
            this.$0.find('.up-down').click();
        });
        this.$0.find('.expand-all').click((e) => {
            this.$0.find('li').removeClass('tree-show');
            this.$0.find('.up-down').click();
        });
    },
    parent: function (data) {
        $.each(data.translations, (i, d) => {
            if (d.locale == $('html').attr('lang')) {
                data.name = d.name
                return;
            }
        });
        var $t = $(`<li category="${data.id}">
                    <span class="cate">
                        <i class="up-down fal"></i>
                        <a href="#"> <i class="folder fal"></i> ${data.name} </a>
                        <span class="options"></span>
                    </span>
                </li>`);
        $t.data('item', data);
        if (this.options.onadd) {
            var $o = $(`<i class="add px-2 fal fa-plus"></i>`);
            $o.click((e) => {
                e.preventDefault();
                this.options.onadd($t, data);
            });
            $t.find('.options').append($o);
        }
        if (this.options.onedit) {
            var $o = $(`<i class="add px-2 fal fa-edit"></i>`);
            $o.click((e) => {
                e.preventDefault();
                this.options.onedit($t, data);
            });
            $t.find('.options').append($o);
        }
        if (this.options.ondel) {
            var $o = $(`<i class="del px-2 fal fa-trash"></i>`);
            $o.click((e) => {
                e.preventDefault();
                return this.options.ondel($t, data);
            });
            $t.find('.options').append($o);
        }



        if (data.children && data.children.length) {
            var $children = this.children(data.children);
            $t.append($children);
            $t.find(`>.cate>.up-down`).click(() => {
                if ($t.hasClass('tree-show')) {
                    $t.removeClass('tree-show')
                    $children.addClass('d-none');
                } else {
                    $t.addClass('tree-show');
                    $children.removeClass('d-none');

                }
                this.options.callback($t, data);
            });
        } else {
            $t.find(`>.cate>.up-down`).addClass('invisible');
        }
        var ajax = () => {
            $t.addClass('active');
            $.get(`/admin/category/p/${data.id}`).done(res => {

                var $parent = this.parent(res);
                $parent.addClass('tree-show active');
                $parent.find('ul').removeClass('d-none');
                $t.after($parent);
                $t.remove();
                this.options.callback($parent, res);
            });
        }
        $t.find(`>.cate>a`).click((e) => {
            e.preventDefault();
            this.$0.find('.active').removeClass('active');
            $t.addClass('active');
            if ($t.find(`ul`).length) {
                $t.find(`>.cate>.up-down`).click();
            } else {
                ajax();
            }


        });

        return $t;
    },
    children: function (data) {
        var $ul = $('<ul class="d-none">');
        $.each(data, (i, d) => {
            $ul.append(this.parent(d));
        });
        return $ul;
    },
    templates: function () {
        var $ul = $('<ul>');
        $.each(this.options.data, (i, d) => {
            $ul.append(this.parent(d));
        });
        this.$0.append($ul);
    }
}
$.inn
