# bsConfirm

__Project:__ bsConfirm    
__Web:__ <https://github.com/tropotek/bsConfirm>  
__Authors:__ Tropotek <http://www.tropotek.com/>

A jQuery plugin to easily implement confirmation dialogs.

## Contents

- [Installation](#installation)
- [Introduction](#introduction)

## Installation

```html
<script src=" https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js "></script>
<!-- Bootstrap 3.3.7 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="jquery.bsConfirm.js"></script>

<script>
  jQuery(function($) {
    $('[data-confirm]').bsConfirm();
  });
</script>
```

## Introduction

__Enable the bsConfirm plugin__

The plugin will work with Bootstrap version 3, 4, and 5.
```js
jQuery(function($) {
  $('[data-confirm]').bsConfirm();
});
```

This will enable a confirmation dialog on any anchors and submit buttons with the `data-confirm="..."` attribute.

__Basic Confirmation dialog__
```html
<a href="bs3confirm.html" data-confirm="Are you sure you want to submit this action?">Default Confirm</a>
```
The `data-confirm="..."` attribute can contain html markup for example `<br>` or `<strong>...</strong>`.

__Dialog Title__

To set a custom title for the dialog add a `title="..."` attribute to the element.
```html
<a href="bs3confirm.html" title="Confirmation Dialog Title" data-confirm="Are you sure you want to submit this action?">Default Confirm</a>
```

__Dialog colors__

The plugin will use the bootstrap colors if the confirmation trigger element is using them.

If the confirmation element uses `class="btn btn-danger"` then the dialogs header and submit buttons will be set to that color.

The CSS classes used for the header can be changed from their defaults when initiating the plugin:
```js
jQuery(function($) {
  $('[data-confirm]').bsConfirm({
    headerColorMap: {
    primary: 'modal-header-primary',
    success: 'modal-header-success',
    warning: 'modal-header-warning',
    info:    'modal-header-info',
    danger:  'modal-header-danger',
    },
  });
});
```

__Dialog Button text__

To change the dialog button text you can add the following attributes:

- `data-confirm-btn="Confirm"`
- `data-cancel-btn="Cancel"`

To change the button text in the plugin init:
```js
jQuery(function($) {
  $('[data-confirm]').bsConfirm({
    confirmBtn: 'Confirm',
    cancelBtn: 'Cancel',
  });
});
```

 






 


 

