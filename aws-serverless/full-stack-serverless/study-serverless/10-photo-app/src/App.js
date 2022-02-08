import React, { useState } from 'react';
import { withAuthenticator, AmplifySignOut } from '@aws-amplify/ui-react';
import { Radio } from 'antd';

import Posts from './components/Posts';
import CreatePost from './components/CreatePost';

function App() {
  const [viewState, updateViewState] = useState('viewPosts');

  return (
    <div style={container}>
      <h1>Photo App</h1>
      <Radio.Group value={viewState} onChange={(e) => updateViewState(e.target.value)}>
        <Radio.Button value="viewPosts">View Posts</Radio.Button>
        <Radio.Button value="addPost">Add Post</Radio.Button>
      </Radio.Group>
      {viewState === 'viewPosts' ? (
        <Posts />
      ) : (
        <CreatePost updateViewState={updateViewState} />
      )}
      <AmplifySignOut />
    </div>
  );
}

const container = {
  width: 500,
  margin: '0 auto',
  padding: 50,
};

export default withAuthenticator(App);
