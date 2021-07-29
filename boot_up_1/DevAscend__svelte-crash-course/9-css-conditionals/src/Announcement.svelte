<script>
  let show = true;
  let warning = false;

  const hideAlert = () => {
    show = false;
  };
</script>

{#if show}
  <div class="alert" class:warning={warning}>
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
  .warning {
    background-color: lightpink;
    color: darkred;
  }
</style>
