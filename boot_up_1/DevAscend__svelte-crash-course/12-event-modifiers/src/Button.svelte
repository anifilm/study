<script>
  export let btnText = 'Compnent button';
</script>

<div class="card">
  <button on:click|once>{btnText}</button>
</div>

<style>
  button {
    background: #667eea;
    border: 1px solid #4c51bf;
    color: #fff;
  }
  .card {
    padding: 12px;
    border: 2px solid gray;
    margin-bottom: 8px;
  }
</style>
