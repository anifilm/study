<script>
  import Modal from './Modal.svelte';

	let people = [
    { name: 'yoshi', beltColor: 'black', age: 25, id: 1 },
    { name: 'mario', beltColor: 'orange', age: 45, id: 2 },
    { name: 'luigi', beltColor: 'brown', age: 35, id: 3 }
  ];

  const handleClick = (e, id) => {
    people = people.filter(person => person.id != id);
    console.log(e);
  };
</script>

<Modal message="Hello, Ninjas!" isPromo={true} />
<main>
  {#each people as person (person.id)}
    <div>
      <h4>{person.name}</h4>
      {#if person.beltColor === 'black'}
        <p><strong>MASTER NINJA</strong></p>
      {/if}
      <p>{person.age} years old, {person.beltColor} belt.</p>
      <button on:click={(e) => handleClick(e, person.id)}>delete</button>
    </div>
  {:else}
    <p>There are no people to show...</p>
  {/each}
</main>

<style>
  main {
    text-align: center;
    padding: 1em;
    max-width: 240px;
    margin: 0 auto;
  }
  @media (min-width: 640px) {
    main {
      max-width: none;
    }
  }
</style>
