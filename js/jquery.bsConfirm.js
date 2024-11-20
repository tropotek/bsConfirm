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
 * @author Tropotek <http://www.tropotek.com/>
 * @date 2024-11-20
 * @version 1.3
 */

;(function($) {
  let bsConfirm = function(element, options) {

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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button class="btn btn-light btn-cancel" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-primary btn-confirm">Confirm</button>
      </div>
    </div>
  </div>
</div>`,
    }

    // plugin settings
    const defaults = {
      template:    '',
      dataConfirm: 'confirm',
      confirmBtn:  'Confirm',
      cancelBtn:   'Cancel',
      headerColorMap: {
        primary: 'modal-header-primary',
        success: 'modal-header-success',
        warning: 'modal-header-warning',
        info:    'modal-header-info',
        danger:  'modal-header-danger',
      },
    };

	  // Plugin private params
    let plugin = this;
    plugin.settings = {};
    let el = $(element);

    // constructor method
    plugin.init = function() {
      plugin.settings = $.extend({}, defaults, el.data(), options);

      // only available for links and submit buttons
      if (!el.is('a, [type=submit]')) return;
      if (typeof $.fn.tooltip === 'undefined') {
        console.warn('Bootstrap is required for this plugin');
        return;
      }

      // select boostrap modal template if not defined by user
      if (plugin.settings.template === '' && parseInt($.fn.tooltip.Constructor.VERSION.charAt(0)) < 5) {
          plugin.settings.template = templateList.template4;
      } else {
          plugin.settings.template = templateList.template5;
      }

      el.on('click', function (e) {
        // remove any active confirm dialogs
        $('.confirm-modal').remove();

        // create modal element
        let modal = $(plugin.settings.template);

        // set modal markup values
        if ((el.attr('title') ?? '') !== '') {
          $('.modal-title', modal).text(el.attr('title'));
        }
        $('.modal-body', modal).html(el.data(plugin.settings.dataConfirm));
        $('.btn-cancel', modal).text(plugin.settings.cancelBtn);
        $('.btn-confirm', modal).text(plugin.settings.confirmBtn);

        let regs = /(primary|success|warning|info|danger)/.exec(el.attr('class'));
        if (regs !== null && regs.length) {
          $('.modal-header', modal).addClass(plugin.settings.headerColorMap[regs[0]] ?? '');
          $('.btn-confirm', modal).addClass('btn-' + regs[0]);
        }

        // close modal on cancel
        $('.btn-cancel', modal).on('click', function () {
          modal.modal('hide');
          if (el.is('a, [type=submit]')) {
            return false;
          }
        });

        // on confirm, follow link or submit form
        $('.btn-confirm', modal).on('click', function () {
          modal.modal('hide');
          if (el.is('a')) {
             document.location = el.attr('href');
          } else if (el.is('[type=submit]')) {
            el.closest('form').submit();
          }
          return true;
        });

        // Append modal to dom and show
        $('body').append(modal);
        modal.on('hidden.bs.modal', function (e) {
          modal.remove();
        })
        modal.modal('show');

        // disable default click action
        return false;
      });

    };  // END init()

    plugin.init();
  };

  // add the plugin to the jQuery.fn object
  $.fn.bsConfirm = function(options) {
    return this.each(function() {
      if (undefined === $(this).data('bsConfirm')) {
        let plugin = new bsConfirm(this, options);
        $(this).data('bsConfirm', plugin);
      }
    });
  }

})(jQuery);
