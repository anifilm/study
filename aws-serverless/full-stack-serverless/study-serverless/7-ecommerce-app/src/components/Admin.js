import React, { useState } from 'react';
import '../App.css';
import { Input, Button } from 'antd';

import { API } from 'aws-amplify';
import { withAuthenticator } from '@aws-amplify/ui-react';

const initialState = {
  name: '',
  price: '',
};

const containerStyle = {
  width: 400,
  margin: '20px auto',
};
const inputStyle = {
  marginTop: 10,
};
const buttonStyle = {
  marginTop: 10,
};

const Admin = () => {
  const [itemInfo, updateItemInfo] = useState(initialState);

  function updateForm(e) {
    const formData = {
      ...itemInfo,
      [e.target.name]: e.target.value,
    };
    updateItemInfo(formData);
  }

  async function addItem() {
    try {
      const data = {
        body: {
          ...itemInfo,
          price: parseInt(itemInfo.price),
        },
      };
      updateItemInfo(initialState);
      await API.post('ecommerceapi', '/products', data);
    } catch (err) {
      console.log('error adding item...');
    }
  }

  return (
    <div style={containerStyle}>
      <Input
        name="name"
        onChange={updateForm}
        value={itemInfo.name}
        placeholder="Item name"
        style={inputStyle}
      />
      <Input
        name="price"
        onChange={updateForm}
        value={itemInfo.price}
        placeholder="Item price"
        style={inputStyle}
      />
      <Button onClick={addItem} style={buttonStyle}>
        Add Product
      </Button>
    </div>
  );
};

export default withAuthenticator(Admin);
