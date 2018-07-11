(function ($) {
var extensionMethods = {
    select: function () {
      var active = this.$menu.find('.active');
      if(active.length > 0) {
        var val = this.$menu.find('.active').attr('data-value');
        this.$element.val(this.updater(val));
      } else {
          this.$element.parents('form').submit();
      }
      this.$element
        .change();
      return this.hide()
    },
    render: function (items) {
          var that = this;
    
          items = $(items).map(function (i, item) {
            i = $(that.options.item).attr('data-value', item)
            i.find('a').html(that.highlighter(item))
            return i[0]
          });
    
          //items.first().addClass('active')
          this.$menu.html(items);
          return this
        }
};


    $.fn.typeahead.Constructor.prototype.select = function () {
        var active = this.$menu.find('.active');
        if(active.length > 0) {
            var val = this.$menu.find('.active').attr('data-value');
            this.$element.val(this.updater(val));
        } else {
            this.$element.parents('form').submit();
        }
        this.$element
            .change();
        return this.hide()
    };

    $.fn.typeahead.Constructor.prototype.render = function (items) {
        var that = this;

        items = $(items).map(function (i, item) {
            i = $(that.options.item).attr('data-value', item);
            i.find('a').html(that.highlighter(item));
            return i[0];
        });

        //items.first().addClass('active')
        this.$menu.html(items);
        return this;
    };

});
//$.extend(true, $.fn.typeahead.Constructor.prototype, extensionMethods);})(jQuery);