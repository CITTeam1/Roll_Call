  <script type="text/javascript">
    $(".nospace").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});



// outputs: `Chrome 62`


</script>




<footer class="footer text-center">
  <div class="container">
    <span> <?php echo "Copyright © 2018 bossier parish community college. All rights reserved. Computer Services"; ?>
    </span>
  </div>
</footer>