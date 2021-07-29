<script>
  let show = true;

  const hideAlert = () => {
    show = false;
  };
</script>

{#if show}
  <div class="alert">
    50% off all fruit. Sign up for more fruit!
    <button on:click={hideAlert}>Hide</button>
  </div>
{/if}

<style>
  .alert {
    padding: 8px;
    font-size: 18px;
    background-color: darkseagreen;
    color: darkslategray;
  }
</style>
