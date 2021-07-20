<script>
  let firstName = 'Anifilm';
  let lastName = 'Lim';
  let src = 'favicon.png';

  $: fullName = `${firstName} ${lastName}`;
  $: {
    console.log(lastName);
    console.log(firstName);
  }
</script>

<main>
  <h1>Hello {fullName}!</h1>
  <img {src} alt="Svelte logo" />

  <label for="firstname">
    FirstName <input type="text" bind:value={firstName} />
  </label>
  <label for="lastname">
    LastName <input type="text" bind:value={lastName} />
  </label>
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
