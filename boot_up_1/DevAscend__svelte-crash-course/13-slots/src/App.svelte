<script>
  import Card from "./Card.svelte"

  let name = 'Anifilm';
  let src = 'favicon.png';
</script>

<main>
  <h1>Hello {name}!</h1>
  <img {src} alt="Svelte logo" />

  <Card>
    <h3>Card</h3>
    <p>This is out card.</p>
    <button slot="button">Test button</button>
    <div>
      <h4>This is below everything.</h4>
    </div>
  </Card>
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
