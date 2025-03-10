# bsConfirm

__Author:__ Tropotek <http://www.tropotek.com/>

A jQuery plugin to implement basic Bootstrap confirmation dialogs.

## Contents

- [Installation](#installation)
- [Options](#options)
- [Usage](#usage)

## Installation

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://unpkg.com/htmx.org@2.0.4/dist/htmx.js" integrity="sha384-oeUn82QNXPuVkGCkcrInrS1twIxKhkZiFfr2TdiuObZ3n3yIeMiqcRzkIcguaof1" crossorigin="anonymous"></script>
<script src="jquery.bsConfirm.js"></script>

<script>
  jQuery(function($) {
    $('[data-confirm]').bsConfirm();
  });
</script>
```

__Enable the bsConfirm plugin__

The plugin is compatible with Bootstrap versions 3, 4, and 5.

To enable confirmation dialogs on anchors and form submit buttons using the `data-confirm="..."` attribute:
```js
jQuery(function($) {
  $('[data-confirm]').bsConfirm({});
});
```

## Options

| Name           | Type   | Default   | Description                                                                                                                                                                     |
|----------------|--------|-----------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| template       | string | ''        | The dialog HTML template to use. If empty the plugin will select a template based on the Bootstrap version in use.                                                              |
| dataConfirm    | string | 'confirm' | The name of the data attribute that contains the confirmation text. To use the attr `data-bs-confirm` this value would be set to its jQuery $.data() selector value `bsConfirm` |
| confirmBtn     | string | 'Confirm' | Set the text of the dialog confirm button                                                                                                                                       |
| cancelBtn      | string | 'Cancel'  | Set the text of the dialog cancel button                                                                                                                                        |
| headerColorMap | object | object    | A map of dialog header class names to use for dialog colors                                                                                                                     |
| onCancel       | event  | null      | Event                                                                                                                                                                           |
| onConfirm      | event  | null      | Event                                                                                                                                                                           |


## Usage

Links:
```html
<a href="index.html" data-confirm="Are you sure you want to submit this action?">Default Confirm</a>
```

Forms:
```html
<form method="get">
  ...
  <button type="submit" class="btn btn-primary" data-confirm="Are you sure you want to submit this form?">Submit</button>
</form>
```

The `data-confirm="..."` attribute can contain basic html markup for example `<br>` or `<strong>...</strong>`.

__Dialog Title__

The elements `title` attribute will be used to set the dialog's title if it exists:
```html
<a href="index.html" title="Confirmation Dialog Title" data-confirm="Are you sure you want to submit this action?">Default Confirm</a>
```

__Dialog Header Colors__

The plugin will use the bootstrap color from the trigger element if it exists or else the dialog will use default styling.

If the trigger element uses `class="btn btn-danger"` the dialogs header and submit buttons will be set to use the `danger` color.

The CSS classes used for the dialog headers can be changed from their defaults when initiating the plugin:
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

_Note: Bootstrap does not define dialog header colors by default, 
see the example pages for how to implement the color classes._


__Dialog Button text__

To change the dialog button text you can add the following attributes to the element:

- `data-confirm-btn="Confirm"`
- `data-cancel-btn="Cancel"`

To change the Default button text for all elements set them on plugin init:
```js
jQuery(function($) {
  $('[data-confirm]').bsConfirm({
    confirmBtn: 'Confirm',
    cancelBtn: 'Cancel',
  });
});
```

 






 


 

