<script>
  import Header from './components/Header.svelte';
  import Footer from './components/Footer.svelte';
  import PollList from './components/PollList.svelte';
  import CreatePollForm from './components/CreatePollForm.svelte';
  import Tabs from './shared/Tabs.svelte';

  // tabs
  let items = ['Current Polls', 'Add New Poll'];
  let activeItem = 'Current Polls';
  const tabChange = (e) => {
    activeItem = e.detail;
  };

  /* polls
  let polls = [
    {
      id: 1,
      question: 'Python or JavaScript?',
      answerA: 'Python',
      answerB: 'JavaScript',
      votesA: 9,
      votesB: 15
    }
  ]; */

  const handleAdd = (e) => {
    const poll = e.detail;
    polls = [poll, ...polls];
    activeItem = 'Current Polls';
  };

  const handleVote = (e) => {
    const { id, option } = e.detail;

    let copiedPolls = [...polls];
    let upvotePoll = copiedPolls.find(poll => poll.id === id);

    if (option === 'a') {
      upvotePoll.votesA += 1;
    }
    if (option === 'b') {
      upvotePoll.votesB += 1;
    }

    polls = copiedPolls;
  };
</script>

<Header />
<main>
  <Tabs activeItem={activeItem} items={items} on:tabChange={tabChange} />
  {#if activeItem === 'Current Polls'}
    <PollList on:vote={handleVote} />
  {:else if activeItem === 'Add New Poll'}
    <CreatePollForm on:add={handleAdd} />
  {/if}
</main>
<Footer />

<style>
  main {
    width: 100%;
    max-width: 960px;
    margin: 40px auto;
  }
</style>
