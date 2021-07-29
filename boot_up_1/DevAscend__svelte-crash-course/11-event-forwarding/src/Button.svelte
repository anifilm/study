<script>
  export let btnText = 'Compnent button';
</script>

<div on:click>
  <span>Click to log</span>
  <button>{btnText}</button>
</div>

<style>
  button {
    background: #667eea;
    border: 1px solid #4c51bf;
    color: #fff;
  }
</style>
