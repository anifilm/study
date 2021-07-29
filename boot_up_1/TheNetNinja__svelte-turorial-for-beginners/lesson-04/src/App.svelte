<script>
  let name = 'Anifilm';
  let beltColor = 'black';

  const handleClick = () => {
		beltColor = (beltColor === 'black') ? 'orange' : 'black';
  };

//const handleInput = (e) => {
//  beltColour = e.target.value;
//};
</script>

<main>
  <h1>Hello {name}!</h1>
  <p style="color: {beltColor}">{beltColor} belt</p>
	<button on:click={handleClick}>update belt color</button>
  <!-- 단방향 바인딩
  <input type="text" on:input={handleInput} value={beltColor}> -->
  <!-- 양방향 바인딩 -->
  <input type="text" bind:value={beltColor}>
</main>

<style>
  main {
    text-align: center;
    padding: 1em;
    max-width: 240px;
    margin: 0 auto;
  }

  h1 {
    color: #ff3e00;
    text-transform: uppercase;
    font-size: 4em;
    font-weight: 100;
  }

  @media (min-width: 640px) {
    main {
      max-width: none;
    }
  }
</style>
