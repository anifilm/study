<script>
  let name = 'Anifilm';
  let src = 'favicon.png';
  let count = 0;

  const incrementCounter = () => {
    count += 1;
  };
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

  <h3>Counter: {count}</h3>
  <button on:click={incrementCounter}>Add 1 to Counter</button>
</main>

<style>
  main {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  h1 {
    font-size: 72px;
    text-align: center;
  }

  h3 {
    font-size: 38px;
  }
</style>
