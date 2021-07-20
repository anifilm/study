<script>
    let name = 'Anifilm';
    let src = 'favicon.png';

    const handleInput = (event) => {
        name = event.target.value;
    };

    const resetName = () => {
        name = 'Unknown';
    };
</script>

<main>
    <h1>Hello {name}!</h1>
    <img {src} alt="Svelte logo" />
    <input type="text" bind:value={name} />
    <button on:click={resetName}>Set name to Unknown</button>
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
		margin-bottom: 30px;
	}
</style>
