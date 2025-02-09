<?php



?>

<script src=" https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js "></script>

<?php if($is_bs5): ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<script src="https://unpkg.com/htmx.org@2.0.4/dist/htmx.js"
        integrity="sha384-oeUn82QNXPuVkGCkcrInrS1twIxKhkZiFfr2TdiuObZ3n3yIeMiqcRzkIcguaof1"
        crossorigin="anonymous"></script>

<?php else: ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<?php endif ?>

<script src="../js/jquery.bsConfirm.js"></script>

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
