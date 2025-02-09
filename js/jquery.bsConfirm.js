/**
 * Plugin: bsConfirm
 *
 * Description:
 *
 * To enable the plugin on your desired selector you can use the following script
 * that defaults to a standard javascript dialog if the plugin is not available.
 *
 * ```
 *   if (typeof $.fn.bsConfirm !== 'undefined') {
 *     $('[data-confirm]').bsConfirm();
 *   }
 * ```
 *
 * All elements containing the data-confirm attribute will have a confirm dialog on the click event.
 *
 * ```
 *   <a href="/home/page/action" title="Action Confirmation Title"
 *      data-confirm="Are you sure you want to complete this action?"
 *      data-confirm-btn="Yep" data-cancel-btn="Nuh">Action</a>
 * ```
 *
 * The plugin can also be called statically using the `onConfirm` and `onCancel` events:
 * ```
 *    $(this).on('click', function() {
 *        bsConfirm({
 *            onCancel: function () {},
 *            onConfirm: function() {
 *                alert('confirmed');
 *            }
 *        }, this);
 *        return false;
 *    })
 * ```
 * Note: you can also call $.fn.bsConfirm(...), they are equally valid
 *
 * @author Tropotek <http://www.tropotek.com/>
 * @date 2025-02-10
 * @version 1.4
 */
let bsConfirm = function (options, element, withOnClick = false) {

    const templateList = {
        // BS3-BS4 modal template
        template4: /*html*/`
              <div class="modal fade bsConfirm-modal" tabindex="-1" role="dialog" aria-labelledby="bsConfirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="bsConfirmModalLabel">Confirm</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                      <button class="btn btn-default btn-cancel" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary btn-confirm">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>`,
        // BS5+ modal template
        template5: /*html*/`
              <div class="modal fade bsConfirm-modal" tabindex="-1" role="dialog" aria-labelledby="bsConfirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="bsConfirmModalLabel">Confirm</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                      <button class="btn btn-light btn-cancel" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary btn-confirm">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>`,
    };

    // plugin settings
    const defaults = {
        template: '',
        title: 'Click to confirm',
        message: '',
        color: '',
        confirmBtn: 'Confirm',
        cancelBtn: 'Cancel',
        onCancel: function () { },
        onConfirm: function () { },
        messageAttr: 'confirm',      // the data-confirm message attr
        headerColorMap: {
            primary: 'modal-header-primary',
            success: 'modal-header-success',
            warning: 'modal-header-warning',
            info: 'modal-header-info',
            danger: 'modal-header-danger',
        },
    };

    // Plugin private params
    let plugin = this;
    plugin.settings = {};
    let el = $(element);

    // constructor method
    plugin.init = function () {
        // only available for links and submit buttons
        if (typeof $.fn.tooltip === 'undefined') {
            console.warn('Bootstrap is required for this plugin');
            return;
        }

        // init plugin settings
        $.extend(plugin.settings, defaults, options, el.data());

        // select boostrap modal template if not defined by user
        if (plugin.settings.template === '' && parseInt($.fn.tooltip.Constructor.VERSION.charAt(0)) < 5) {
            plugin.settings.template = templateList.template4;
        } else {
            plugin.settings.template = templateList.template5;
        }

        // remove any existing confirm dialogs
        $('.confirm-modal').remove();

        // set values from button element
        if (typeof el !== 'undefined') {
            let regs = /(primary|success|warning|info|danger)/.exec(el.attr('class'));
            if (regs) {
                plugin.settings.color = regs[0] ?? plugin.settings.color;
            }
            plugin.settings.color = el.data('color') ?? plugin.settings.color;
            plugin.settings.title = (el.attr('title') ?? plugin.settings.title);
            plugin.settings.message = el.data(plugin.settings.messageAttr) ?? el.attr('hx-confirm') ?? '';
        }

        if (withOnClick) {
            // called via jQuery plugin
            el.on('click', function () {
                let btn = $(this);
                let form = btn.closest('form');
                if (!btn.is('a, [type=submit]')) return;

                plugin.settings.onConfirm = function () {
                    if (btn.is('a')) {
                        document.location = btn.attr('href');
                    } else if (btn.is('[type=submit]')) {
                        // add a submit button name/value to trigger the correct event
                        if (btn.attr('name')) {
                            form.append(`<input type="hidden" name="${btn.attr('name')}" value="${btn.attr('value')}">`);
                        }
                        form.submit();
                    }
                };

                showConfirm();
                return false;
            });
        } else {
            // statically called plugin
            showConfirm();
        }

    };  // END init()

    let showConfirm = function (opts) {
        // create modal element
        let modal = $(plugin.settings.template);

        // set modal markup values
        $('.modal-title', modal).text(plugin.settings.title);
        $('.modal-body', modal).html(plugin.settings.message);
        $('.btn-cancel', modal).text(plugin.settings.cancelBtn);
        $('.btn-confirm', modal).text(plugin.settings.confirmBtn);

        if (plugin.settings.color) {
            $('.modal-header', modal).addClass(plugin.settings.headerColorMap[plugin.settings.color] ?? '');
            $('.btn-confirm', modal).addClass('btn-' + plugin.settings.color);
        }

        $('.btn-cancel', modal).on('click', function (e) {
            plugin.settings.onCancel.apply(modal, arguments);
            modal.modal('hide');
        });

        $('.btn-confirm', modal).on('click', function (e) {
            plugin.settings.onConfirm.apply(modal, arguments);
            modal.modal('hide');
        });

        // Append modal to dom and show
        $('body').append(modal);

        modal.on('hidden.bs.modal', function (e) {
            modal.remove();
        })

        modal.modal('show');
    };

    plugin.init();
};

// add the plugin to the jQuery.fn object
;(function ($) {
    $.fn.bsConfirm = function (options, element) {
        if (this.length === 0 && typeof options === 'object') {
            return new bsConfirm(options, element);
        }
        return this.each(function () {
            if (undefined === $(this).data('bsConfirm')) {
                let plugin = new bsConfirm(options, this, true);
                $(this).data('bsConfirm', plugin);
            }
        });
    }
})(jQuery);
