<script>
  import Button from './Button.svelte';

  let name = 'Anifilm';
  let src = 'favicon.png';

  const log = () => {
    console.log('Button clicked!');
  };
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

	<Button on:click={log}/>
	<button on:click={log}>App button</button>
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
