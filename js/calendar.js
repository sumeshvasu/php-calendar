var PN_CALENDAR = function() {

    var self = {
        init: function() {
            //***
            jQuery.fn.life = function(types, data, fn) {
                "use strict";
                jQuery(this.context).on(types, this.selector, data, fn);
                return this;
            };
            //***
            jQuery('#pn_get_next_month, #pn_get_prev_month').life('click', function() {
                self.redraw({'month': jQuery(this).data('month'), 'year': jQuery(this).data('year')});
            });
            //***
            jQuery('#pn_calendar_year_selector').life('change', function() {
                jQuery('#pn_calendar_month_selector').prop('disabled', true);
                self.redraw({'month': jQuery('#pn_cal_current_month').val(), 'year': jQuery(this).val()});
            });
            //***
            jQuery('#pn_calendar_month_selector').life('change', function() {
                jQuery('#pn_calendar_year_selector').prop('disabled', true);
                self.redraw({'month': jQuery(this).val(), 'year': jQuery('#pn_cal_current_year').val()});
            });

            return false;
        },
        redraw: function(values) {
            var data = {
                action: "pn_get_month_cal",
                month: values.month,
                year: values.year
            };
            jQuery.post(ajaxurl, data, function(response) {
                jQuery('#pn_calendar').html(response);
            });
        }
    };

    return self;
};
