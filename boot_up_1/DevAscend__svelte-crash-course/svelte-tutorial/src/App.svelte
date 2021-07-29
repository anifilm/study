<script>
  import { identity } from 'svelte/internal';

  import Form from './Form.svelte';

  let name = 'Anifilm';
  let src = 'favicon.png';

  let foods = [
    { name: 'Apple', color: 'red', id: 0 },
    { name: 'Carrot', color: 'orange', id: 1 },
    { name: 'Orange', color: 'orange', id: 2 },
  ];

  const addFood = (e) => {
    console.log(e.detail);

    const food = e.detail;
		foods = [food, ...foods];
  };
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

  <Form on:addFood={addFood} />
  {#each foods as food (food.id)}
    <div class="fooditem">
      <h3>{food.name}</h3>
      <p>Color: {food.color}</p>
    </div>
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

  .fooditem {
    border: 2px solid gray;
    text-align: left;
    padding: 8px;
    margin-top: 20px;
    width: 100%;
  }
</style>
