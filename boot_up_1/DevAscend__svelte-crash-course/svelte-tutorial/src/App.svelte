<script>
  let name = 'Anifilm';
  let src = 'favicon.png';
  let fruits = [
    { name: 'Apple', color: 'red', amount: 5, id: 1 },
    { name: 'Banana', color: 'yellow', amount: 7, id: 2 },
    { name: 'Grape', color: 'purple', amount: 3, id: 3 }
  ];
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

  {#each fruits as fruit (fruit.id)}
    <div class="card">
      <h5>{fruit.name}</h5>
      <p>{fruit.color}</p>
    </div>
  {:else}
    <p>There is no fruit in our fruit array</p>
  {/each}
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

  img {
    margin-bottom: 36px;
  }

  .card {
    min-width: 400px;
    padding: 8px;
    border-radius: 20px;
    border: 2px solid gray;
    margin-top: 8px;
  }

  h5, p {
    margin: 4px 0px;
  }
</style>
