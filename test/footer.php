<?php



?>
<script>
  jQuery(function($) {
    // global with data-confirm attr
    $('#links [data-confirm]').bsConfirm();
    $('#form [data-confirm]').bsConfirm();

    // static
    $('#static [data-confirm]').each(function() {
        $(this).on('click', function() {
            bsConfirm({
                onConfirm: function() {
                    alert('confirmed');
                }
            }, this);
            return false;
        })
    });

    // htmx hx-confirm attr
    $(document).on('htmx:confirm', function(e) {
      if (e.defaultPrevented) return;
      if (!e.detail.elt.hasAttribute('hx-confirm')) return;
      e.preventDefault();
      bsConfirm({
        onConfirm: function() { e.detail.issueRequest(true); }
      }, e.detail.elt);
    });

  });
</script>

</body>
</html>
