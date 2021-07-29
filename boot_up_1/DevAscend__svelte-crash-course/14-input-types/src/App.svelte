<script>
  let name = 'Anifilm';
  let src = 'favicon.png';

  let age = 44;
  let isChecked = true;
  let value = 2;
  let selected;

  let questions = [
    { id: 1, text: 'What is your favorite color?' },
    { id: 2, text: 'What is your favorite fruit?' }
  ];
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

  <form>
    Name <input type="text" bind:value={name} />
  </form>
  <form>
    Age <input type="number" bind:value={age} />
  </form>

  <label>
    <input type="radio" bind:group={value} value={1} />
    1
  </label>
  <label>
    <input type="radio" bind:group={value} value={2} />
    2
  </label>
  <label>
    <input type="radio" bind:group={value} value={3} />
    3
  </label>

  <select bind:value={selected}>
    {#each questions as question}
      <option value={question}>{question.text}</option>
    {/each}
  </select>
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
</style>
